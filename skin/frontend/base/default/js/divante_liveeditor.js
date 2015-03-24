/**
 * Dmitrij Rysanow <dmitrij.rysanow@gmail.com>
 */

jQuery.noConflict();


var FormRenderer = (function () {
    var elements = {
        formDiv: "#le_form_markup",
        form: "#le_form_form",
        formTitle: "#le_form_title",
        closeButton: '#le_form_close',
        sendButton: '#le_form_send',
        overlay: '.overlay'
    }

    var currentForm;

    /**
     * Return jQuery object with field
     * @param field
     * @returns {jQuery.node}
     */
    function createField(field, element) {
        var attr = {
            id: "#" + field.id,
            type: field.type,
            name: field.id
        };

        var label = jQuery('<label />').addClass("le_form_field_label").attr({
            "for": field.id
        }).text(field.label);
        var jqObj = jQuery('<div />').addClass("le_form_field");
        switch (field.type) {
            case "text":
            case "password":
                var input = jQuery('<input />').attr(attr);
                var span = jQuery('<span />').addClass("le_form_field_span");
                span.append(input);
                jqObj.append(label).append(span);
                break;
            case "html":
            case "textarea":
                if (typeof field.value !== "undefined" && typeof field.value !== "function") {
                    var text = field.element;
                } else if (typeof field.value === "function") {
                    var text = field.value(element);
                }
                var textarea = jQuery('<br><textarea />').attr(attr).html(text).height(350).width(600);

                jqObj.append(label).append(textarea);
                break;

            case "select":
                var select = jQuery('<select />').attr(attr);
                jQuery.each(field.options, function (index, value) {
                    var option = jQuery('<option />').attr({
                        value: value.value
                    });
                    if (value.selected !== null && value.selected === true) {
                        option.prop("selected", true);
                    }
                    option.text(value.name);
                    select.append(option);
                    jqObj.append(label).append(select);
                });
                break;
            default:
                throw "Not supported field type";
        }

        return jqObj;
    }

    function cleanForm() {
        jQuery(elements.form).find("fieldset").children().remove();
    }

    function scrollToViewport(form) {
        var scrollPos = jQuery(document).scrollTop();

        jQuery(form).animate({
            "margin-top": scrollPos - 100
        },300);
    }


    function unscrollViewport(form, callback) {
        jQuery(form).animate({
            "margin-top": 100
        },300,function() {
            if (typeof callback === "function") {

                callback();
            }
        });

    }

    return {
        init: function () {
            var that = this;
            jQuery(elements.closeButton).click(function () {
                that.closeForm(true);
            });
        },

        /**
         * Shows forms
         * @param FormObject formObj
         */
        openForm: function (formObj, element) {
            this.closeForm(false);
            var that = this;
            currentForm = formObj;
            jQuery(elements.formTitle).text(currentForm.label);

            jQuery.each(currentForm.fields, function (index, field) {
                var field = createField(field, element);
                jQuery(elements.form).find("fieldset").append(field);
            });
            jQuery(elements.overlay).show();
            jQuery(elements.overlay).click(function () {
                that.closeForm(true);
            });

            jQuery(elements.formDiv).show();
            scrollToViewport(elements.formDiv);
        },
        closeForm: function (current) {
            if (current) {
                unscrollViewport(elements.formDiv, function () {
                    jQuery(elements.formDiv).hide();
                    cleanForm();
                    jQuery(elements.overlay).hide();
                });

            } else {
                cleanForm();
            }

            currentForm = null;
        }
    }
})();

var LiveEditorToolbar = (function () {

    var defaults = {
        FormObjects: [],
        SiteOptions: {
            action: "changeSiteOptions",
            label: "Site Options",
            fields: [
                {
                    label: "Title",
                    id: "title",
                    type: "text",
                    value: "2"
                },
                {
                    label: "Meta description",
                    id: "meta_description",
                    type: "text",
                    value: "lorem"
                }
            ]
        },
        editPNG: 'edit.png',
        viewPNG: 'view.png'
    }

    var elements = {
        toolbarDiv: "#le_toolbar",
        expandButton: '.expandButton',
        siteOptions: '.le_site_options_button',
        modeSwitcher: '.le_modeselector',
        activeElementDiv: ".activeElement",
        currentModeDiv: ".currentMode"
    }
    var options;
    var forms;
    var currentMode;

    jQuery.fn.hoverEffect = function () {
        jQuery(this).animate({
            opacity: 0.5
        }, 100)
        jQuery(this).css({
            cursor: "pointer"
        })
    }

    jQuery.fn.unHoverEffect = function () {
        jQuery(this).animate({
            opacity: 1
        }, 100);
        jQuery(this).css({
            cursor: "auto"
        })
    }

    /**
     * Create events
     * @param bool defaults - if TRUE will attach DefaultForms
     */
    function createEvents() {
        jQuery(elements.modeSwitcher).off("click");
        jQuery(elements.modeSwitcher).click(function () {
            switch (currentMode) {
                case "view":
                    //change to editMode

                    jQuery(this).find('img').attr('src', options.viewPNG);
                    jQuery(this).find('p').text("view");
                    jQuery(elements.currentModeDiv).html("<b>Edit Mode</b>");
                    currentMode = "edit";
                    break;


                case "edit":
                    //change to viewMode

                    jQuery(this).find('img').attr('src', options.editPNG);
                    jQuery(this).find('p').text("edit");
                    jQuery(elements.currentModeDiv).html("<b>View Mode</b>");
                    FormRenderer.closeForm();
                    jQuery(elements.activeElementDiv).text("");
                    currentMode = "view";
                    break;
            }
        });
        jQuery.each(forms, function (index, form) {
            jQuery(form.elements).each(function (index2, element) {
                jQuery(element).hover(function () {
                    if (currentMode === "edit") {
                        jQuery(elements.activeElementDiv).text(form.label + " - Click to edit");

                        jQuery(element).hoverEffect();
                    }
                }, function () {
                    if (currentMode === "edit") {
                        jQuery(elements.activeElementDiv).text("");

                        jQuery(element).unHoverEffect();
                    }
                });

                jQuery(element).click(function (e) {

                    if (currentMode === "edit") {
                        e.preventDefault();
                        FormRenderer.openForm(form, this);
                    }
                })
            })
        });
    }


    return {
        init: function (userOptions) {
            FormRenderer.init();
            options = jQuery.extend({}, defaults, userOptions);
            forms = new Array;

            jQuery(options.FormObjects).each(function (i, v) {
                forms.push(v);
            });

            jQuery(elements.siteOptions).click(function () {

                FormRenderer.openForm(options.SiteOptions);
            });


            currentMode = "view";

            createEvents();

            jQuery.ajax({
                type: 'POST',
                url: "/liveeditor/index/view",
                data: {
                    referer_action: jQuery("input[name='referer_action']").val(),
                    id: jQuery("input[name='id']").val()
                },
                dataType: "json",
                success: function (data) {
                    jQuery('.le_admin_page_button').attr('href', data);
                }
            });

            jQuery.ajax({
                url: "/liveeditor/index/logout",
                dataType: "json",
                success: function (data) {
                    jQuery('.le_logout_button').attr('href', data);
                }
            });

        },
        addForm: function (Form) {
            forms.push(Form);
            createEvents();
        }
    }
})();