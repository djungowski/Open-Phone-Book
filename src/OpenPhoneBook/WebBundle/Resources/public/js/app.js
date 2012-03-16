Ext.application({
    
    name: 'OpenPhoneBook',
    
    launch: function() {
        var navigation,
            main;
        
        this.registerNamespaces();
        this.setupLocale();
        
        navigation = Ext.create('OpenPhoneBook.panel.Navigation', {
            region: 'west'
        });
        
        main = Ext.create('Ext.panel.Panel', {
            title: 'Open Phone Book',
            region: 'center',
            frame: true
        });
        
        Ext.create('Ext.container.Viewport', {
            layout: 'border',
            items: [
                navigation,
                main
            ]
        });
    },
    
    registerNamespaces: function() {
        Ext.Loader.setPath('OpenPhoneBook', 'bundles/openphonebook/js/app/OpenPhoneBook');
    },
    
    setupLocale: function() {
        var opbLocale;
        
        Ext.syncRequire('OpenPhoneBook.locale.Locale');
        
        opbLocale = Ext.create('OpenPhoneBook.locale.De');
        OpenPhoneBook.locale.Locale.setLocale(opbLocale);
        
        window.opbLocale = OpenPhoneBook.locale.Locale; 
    }
});