Ext.require('OpenPhoneBook.data.model.Phonebook');

Ext.define('OpenPhoneBook.panel.Phonebook', {
    
    extend: 'Ext.grid.Panel',
    
    frame: true,
    
    initComponent: function() {
        
        this.store = this.store || Ext.create('Ext.data.Store', {
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
        
        this.columns = this.columns || [
            {header: OpenPhoneBook.Locale.trans('phonebook.name'), dataIndex: 'name'},
            {header: OpenPhoneBook.Locale.trans('phonebook.firstname'), dataIndex: 'firstname'},
            {header: OpenPhoneBook.Locale.trans('phonebook.directaccess'), dataIndex: 'directaccess'},
            {header: OpenPhoneBook.Locale.trans('phonebook.room'), dataIndex: 'room'},
            {header: OpenPhoneBook.Locale.trans('phonebook.company'), dataIndex: 'company', renderer: function(value) {
                return value.name;
            }},
        ];
        
        this.tbar = this.tbar || Ext.create('OpenPhoneBook.toolbar.Phonebook');
        this.tbar.on('search', function(searchTerm) {
            this.store.getProxy().extraParams.q = searchTerm;
            this.store.load();
        }, this);
        
        this.bbar = this.bbar || Ext.create('Ext.toolbar.Paging', {
            store: this.store,
            displayInfo: true
        });
        
        this.on('render', function() {
            this.store.load();
        }, this);
        
        this.callParent();
    }
    
});