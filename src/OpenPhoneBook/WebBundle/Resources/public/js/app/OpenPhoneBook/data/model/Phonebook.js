Ext.define('OpenPhoneBook.data.model.Phonebook', {
    
    extend: 'Ext.data.Model',
    
    fields: [
        {name: 'id', type: 'int'},
        {name: 'name', type: 'string'},
        {name: 'firstname', type: 'string'},
        {name: 'room', type: 'int'},
        {name: 'directaccess', type: 'int'},
        {name: 'company', type: 'auto'},
    ]
    
});