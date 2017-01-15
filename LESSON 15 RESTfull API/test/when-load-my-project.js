describe('when load my project page', function () {
    it('test enter', function(){
        browser.get('http://localhost:8000/app/#!/');

        var title = browser.getTitle();

        expect(title).toEqual('Фреймворк AngularJS / Нетология');
    });
});