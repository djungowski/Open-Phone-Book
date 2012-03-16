Ext.define('OpenPhoneBook.locale.Locale', {
    
    alternateClassName: 'OpenPhoneBook.Locale',
    
    statics: {
        
        locale: null,
        
        setLocale: function(locale) {
            OpenPhoneBook.locale.Locale.locale = locale;
        },
        
        trans: function(id, fallbackValue) {
            return this.locale.trans(id, fallbackValue);
        }
        
    }

});