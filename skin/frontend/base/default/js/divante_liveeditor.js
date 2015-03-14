jQuery.noConflict();
var SiteOptionsForm = {
    action: "changeSiteOptions",
    label: "Site Options",
    fields: [
        {
            label: "Title",
            id: "title",
            type: "text"
        },
        {
            label: "Meta keywords",
            id: "meta_keywords",
            type: "textarea"
        },
        {
            label: "Meta description",
            id: "meta_description",
            type: "text"
        },
        {
            label: "Example select",
            id: "selector",
            type: "select",
            options: [
                {
                    value: 'a',
                    name: 'aa'
                },
                {
                    value: 'b',
                    name: 'bb',
                    selected: true
                },
            ]
        }
    ]
}

var FormRenderer = (function() {
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
    function createField(field) {
        var attr = {
            id: "#"+field.id,
            type: field.type,
            name: field.id
        };

        var label = jQuery('<label />').addClass("le_form_field_label").attr({
            "for":field.id
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

            case "textarea":
                var textarea = jQuery('<textarea />').attr(attr);
                jqObj.append(label).append(textarea);
                break;

            case "select":
                var select = jQuery('<select />').attr(attr);
                jQuery.each(field.options, function(index,value) {
                    var option = jQuery('<option />').attr({
                        value: value.value
                    });
                    if (value.selected !== null && value.selected === true)
                    {
                        option.prop("selected",true);
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

    return {
        init: function() {
            var that = this;
            jQuery(elements.closeButton).click(function() {
                that.closeForm();
            });
        },

        /**
         * Shows forms
         * @param FormObject formObj
         */
        openForm: function(formObj) {
            var that = this;
            currentForm = formObj;
            jQuery(elements.formTitle).text(currentForm.label);

            jQuery.each(currentForm.fields, function(index,value) {
                var field = createField(value);
                jQuery(elements.form).find("fieldset").append(field);
            });
            jQuery(elements.overlay).show();
            jQuery(elements.overlay).click(function() {that.closeForm()});
            jQuery(elements.formDiv).fadeIn();
        },
        closeForm: function() {
            jQuery(elements.formDiv).hide();
            jQuery(elements.overlay).hide();
            cleanForm();
        }
    }
})();

var LiveEditorToolbar = (function() {
    
    var elements = {
        toolbarDiv: "#le_toolbar",
        expandButton: '.expandButton',
        siteOptions: '.le_site_options_button',
        modeSwitcher: '.le_modeselector'
    }
    var currentMode;

    return {
        init: function() {
            FormRenderer.init();
            jQuery(elements.siteOptions).click(function() {

                FormRenderer.openForm(SiteOptionsForm);
            });

            currentMode = "view";
            jQuery(elements.modeSwitcher).click(function() {
                if (currentMode === "view") {
                    currentMode = "edit";
                    jQuery(this).find('img').attr('src','edit.png');
                } else {
                    currentMode = "view";
                    jQuery(this).find('img').attr('src','view.png');
                }
                jQuery(this).find('p').text(currentMode);
            })

        }
    }
})();

jQuery(document).ready(function() {
    var toolbar = LiveEditorToolbar.init();
});