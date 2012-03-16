Ext.define('OpenPhoneBook.panel.Navigation', {
    
    extend: 'Ext.panel.Panel',
    
    title: 'Navigation',
        
    width: 250,
    
    collapsible: true,
    
    collapsed: true,
    
    titleCollapse: true,
    
    frame: true,
    
    initComponent: function() {
        var menu,
            menuItemLogin,
            menuItemList;
        
        this.items = this.items || [];
        
        menuItemLogin = Ext.create('Ext.menu.Item', {
            text: 'Einloggen'
        });
        
        menuItemList = Ext.create('Ext.menu.Item', {
            text: 'Telefonbuch anzeigen'
        });
        
        menu = Ext.create('Ext.menu.Menu', {
            floating: false,
            items: [
                menuItemLogin,
                menuItemList
            ]
        });
        
        this.items.push(menu);
        
        this.callParent();
    }
});