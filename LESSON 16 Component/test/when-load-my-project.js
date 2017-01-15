describe('when load my project page', function () {
    var text = 'Test1';
    it('should title like Netology', function(){
        browser.get('http://localhost:8000/app/#!/');
        var title = browser.getTitle();
        expect(title).toEqual('Фреймворк AngularJS / Нетология');
    });
    
    it('enter create pokemon page', function () {
        element(by.id('create_pokemon')).click();
        var title = element(by.css('.md-headline')).getText();
        expect(title).toEqual('Вот вам форма');
    });

    it('create pokemon and test list pokemon', function () {
        element(by.id('input_0')).sendKeys(text);
        element(by.id('input_1')).sendKeys(11);
        element(by.id('input_2')).sendKeys(13);
        element(by.model('newPokemon.active')).click();
        element(by.css('button.md-raised')).click();
        element(by.id('pokemon_list')).click();
        var title = element.all(by.model('repeat-md-list-item')).first().getText();
        expect(title).toEqual(text.toUpperCase());
    });

    it('new pokemon test info page', function () {
        element.all(by.model('repeat-md-list-item')).first().click();
        var title = element(by.css('h1')).getText();
        expect(title).toEqual(text.toUpperCase());
    });
    
    it('update new pokemon', function () {
        // var title = '123';
        var title = element(by.id('pokemon_id')).getText().then(function(text){
            title = `Покемон ${text} обновился!`;
            return(title);
        }).then(function(title){
            element(by.id('update_link')).click();
            element(by.model('pokemon.weight')).clear().sendKeys(22);
            element(by.model('pokemon.height')).clear().sendKeys(25);
            element(by.id('update_pokemon')).click();
            var text = element(by.id('alert_result')).getText();
            expect(text).toEqual(title);
        });
    });

});