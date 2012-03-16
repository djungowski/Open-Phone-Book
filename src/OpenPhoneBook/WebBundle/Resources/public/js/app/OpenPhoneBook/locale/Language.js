Ext.define('OpenPhoneBook.locale.Language', {
    
    catalogue: {},
    
    trans: function(id, fallbackValue) {
        fallbackValue = fallbackValue || null;
        
        if (typeof this.catalogue[id] == 'undefined') {
            return fallbackValue;
        }
        
        return this.catalogue[id];
    }
    
});