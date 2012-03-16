Ext.application({
    
    name: 'OpenPhoneBook',
    
    alternateClassName: 'Opb.Locale',
    
    launch: function() {
        var navigation,
            phonebook,
            main;
        
        this.registerNamespaces();
        this.setupLocale();
        
        navigation = Ext.create('OpenPhoneBook.panel.Navigation', {
            region: 'west'
        });
        
        phonebook = Ext.create('OpenPhoneBook.panel.Phonebook'); 
        
        main = Ext.create('Ext.panel.Panel', {
            title: OpenPhoneBook.Locale.trans('panel.main'),
            layout: 'fit',
            region: 'center',
            frame: true,
            items: [
                phonebook
            ]
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
        
        // Load synchronously, otherwise this won't work
        Ext.syncRequire('OpenPhoneBook.locale.Locale');
        
        opbLocale = Ext.create('OpenPhoneBook.locale.De');
        OpenPhoneBook.locale.Locale.setLocale(opbLocale);
        
        window.opbLocale = OpenPhoneBook.locale.Locale; 
    }
});