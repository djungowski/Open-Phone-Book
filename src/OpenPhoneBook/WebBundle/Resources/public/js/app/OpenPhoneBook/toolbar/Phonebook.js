Ext.define('OpenPhoneBook.toolbar.Phonebook', {
    
    extend: 'Ext.toolbar.Toolbar',
    
    initComponent: function() {
        var searchField;
        
        this.items = this.items || [];
        
        searchField = Ext.create('Ext.form.field.Text', {
            fieldLabel: OpenPhoneBook.Locale.trans('phonebook.tbar.searchtext'),
            labelWidth: 'auto'
        });
        
        this.items.push(searchField);
        
        this.callParent();
    }
    
});