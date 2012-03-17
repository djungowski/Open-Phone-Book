Ext.define('OpenPhoneBook.toolbar.Phonebook', {
    
    extend: 'Ext.toolbar.Toolbar',
    
    initComponent: function() {
        var searchField,
            searchButton;
        
        this.items = this.items || [];
        
        this.addEvents('search');
        
        searchField = Ext.create('Ext.form.field.Text', {
            labelWidth: 'auto'
        });
        
        searchField.on('render', function(field) {
            var nav = new Ext.KeyNav(field.getEl(), {
                scope: this,
                'enter': function() {
                    this.fireEvent('search', searchField.getValue())
                }
            });
        }, this);
        
        
        
        searchButton = Ext.create('Ext.button.Button', {
            text: OpenPhoneBook.Locale.trans('phonebook.tbar.searchtext'),
            handler: function() {
                this.fireEvent('search', searchField.getValue())
            },
            scope: this
        });
              
        this.items.push(searchField);
        this.items.push(searchButton);
        
        this.callParent();
    }
    
});