describe('when load my project page', function () {
    it('test enter', function(){
        browser.get('http://localhost/login');

        var title = browser.getTitle();

        expect(title).toEqual('enter');
    })
});