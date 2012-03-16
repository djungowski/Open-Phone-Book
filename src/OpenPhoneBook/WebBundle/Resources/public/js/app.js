Ext.application({
    name: 'OpenPhoneBook',
    launch: function() {
        var navigation,
            main;
        
        this.registerNamespaces();
        
        navigation = Ext.create('OpenPhoneBook.panel.Navigation', {
            region: 'west'
        });
        
        main = Ext.create('Ext.panel.Panel', {
            title: 'Open Phone Book',
            region: 'center'
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
    }
});