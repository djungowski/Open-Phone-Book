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
                    root: 'record'
                }
            }
        });
        
        this.columns = [
            {header: OpenPhoneBook.Locale.trans('phonebook.name'), dataIndex: 'name'},
            {header: OpenPhoneBook.Locale.trans('phonebook.firstname'), dataIndex: 'firstname'},
            {header: OpenPhoneBook.Locale.trans('phonebook.directaccess'), dataIndex: 'directaccess'},
            {header: OpenPhoneBook.Locale.trans('phonebook.room'), dataIndex: 'room'},
        ];
        
        this.toolbar = Ext.create('Ext.toolbar.Paging', {
            store: this.store,
            displayInfo: true
        });
        
        this.on('render', function() {
            this.store.load();
        }, this);
        
        this.callParent();
    }
    
});