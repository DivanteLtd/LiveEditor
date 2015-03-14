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
            type: "text"
        },
        {
            label: "Meta description",
            id: "meta_description",
            type: "text"
        }
    ]
}

var FormRenderer = (function() {
    var elements = {
        formDiv: "#le_form_markup",
        form: "#le_form_form",
        formTitle: "#le_form_title",
        closeButton: '#le_form_close',
        sendButton: '#le_form_send'
    }

    var currentForm;

    /**
     * Return jQuery object with field
     * @param field
     * @returns {jQuery.node}
     */
    function createField(field) {

        var input = jQuery('<input />').attr({
            id: "#"+field.id,
            type: field.type,
            name: field.id
        });
        var span = jQuery('<span />').addClass("le_form_field_span");
        span.append(input);
        var label = jQuery('<label />').addClass("le_form_field_label").attr({
            "for":field.id
        }).text(field.label);
        var jqObj = jQuery('<div />').addClass("le_form_field").append(label).append(span);

        return jqObj;
    }

    return {

        init: function() {

        },

        /**
         * Shows forms
         * @param FormObject formObj
         */
        openForm: function(formObj) {
            currentForm = formObj;
            jQuery(elements.formTitle).text(currentForm.label);

            jQuery.each(currentForm.fields, function(index,value) {
                var field = createField(value);
                jQuery(elements.form).find("fieldset").append(field);
            })
            jQuery(elements.formDiv).fadeIn();
        }
    }
})();

var LiveEditorToolbar = (function() {
    
    var elements = {
        toolbarDiv: "#le_toolbar",
        expandButton: '.expandButton',
        siteOptions: '#le_site_options'
    }

    return {
        init: function() {
            FormRenderer.init();
            jQuery(elements.siteOptions).click(function() {
                FormRenderer.openForm(SiteOptionsForm);
            })

        }
    }
})();

jQuery(document).ready(function() {
    var toolbar = new LiveEditorToolbar.init();
});