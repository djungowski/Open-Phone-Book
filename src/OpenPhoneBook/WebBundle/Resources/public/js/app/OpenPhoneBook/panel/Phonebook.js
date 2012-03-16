Ext.require('OpenPhoneBook.data.model.Phonebook');

Ext.define('OpenPhoneBook.panel.Phonebook', {
    
    extend: 'Ext.grid.Panel',
    
    frame: true,
    
    initComponent: function() {
        
        this.store = Ext.create('Ext.data.Store', {
            model: 'OpenPhoneBook.data.model.Phonebook',
            proxy: {
                type: 'ajax',
                url: 'phonebook',
                reader: {
                    type: 'json',
                    root: ''
                }
            }
        });
        
        this.columns = [
            {header: OpenPhoneBook.Locale.trans('phonebook.name')},
            {header: OpenPhoneBook.Locale.trans('phonebook.firstname')},
            {header: OpenPhoneBook.Locale.trans('phonebook.directaccess')},
            {header: OpenPhoneBook.Locale.trans('phonebook.room')},
        ];
        
        this.on('render', function() {
            this.store.load();
        }, this);
        
        this.callParent();
    }
    
});