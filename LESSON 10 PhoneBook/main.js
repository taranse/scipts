document.addEventListener('DOMContentLoaded', function(){
    var name, phone, attr, val;
    const select = document.querySelector('select[name=attr]');
    const update = document.querySelector('button.update');
    function hasClass(elCls, cls) {
        if (!elCls || !cls) return false;
        return (" " + elCls + " ").indexOf(" " + cls + " ") !== -1;
    }

    function getXmlHttp() {
        var xmlhttp;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                xmlhttp = false;
            }
        }
        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
            xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
    }
    select.addEventListener('change', function(){
        console.log(123);
    });
    document.addEventListener('click', function(e){
        if(e.target.tagName == 'BUTTON' && hasClass(e.target.className, 'update')) {
            let parent = e.target.parentNode.parentNode;
            name = parent.children[1].children[0].value;
            phone = parent.children[2].children[0].value;
            attr = parent.children[3].children[0].innerHTML;
            let sel = parent.querySelectorAll('input.change');
            for (let s of sel) s.disabled = false
            parent.children[0].innerHTML = '' +
                '<button class="btn btn-success col-xs-5 okey"><span class="glyphicon glyphicon-ok"></span></button>' +
                '<button class="btn btn-danger col-xs-5 reset"><span class="glyphicon glyphicon-remove"></span></button>' +
                '';
        }
        else if(e.target.tagName == 'BUTTON' && hasClass(e.target.className, 'reset')) {
            let parent = e.target.parentNode.parentNode;
            parent.children[1].children[0].value = name;
            parent.children[2].children[0].value = phone;
            parent.children[3].children[0].innerHTML = attr;
            parent.children[0].innerHTML = '' +
                '<button class="btn btn-default col-xs-5 update"><span class="glyphicon glyphicon-pencil"></span></button>' +
                '<button onclick="window.location= \'/api/deleate/89295700533\'" class="btn btn-danger col-xs-5 deleate"><span class="glyphicon glyphicon-trash"></span></button>' +
                '';
            let sel = parent.querySelectorAll('input.change');
            for (let s of sel) s.disabled = true
            const update = document.querySelector('button.update');
        }
        else if(e.target.tagName == 'BUTTON' && hasClass(e.target.className, 'okey')) {
            let parent = e.target.parentNode.parentNode;
            let nameNew = parent.children[1].children[0].value;
            let phoneNew = parent.children[2].children[0].value;
            let attrNew = parent.children[3].children[0].children;
            let json = {
                name: nameNew,
                phone: phoneNew,
                attr: {}
            };
            for (let a of attrNew){
                json.attr[a.children[0].innerHTML] = a.children[1].value
            }
            let xmlhttp = getXmlHttp();
            xmlhttp.open('POST', '/api/update/' + phone, true);
            xmlhttp.setRequestHeader('Content-Type', 'application/json');
            xmlhttp.send(JSON.stringify(json));
            parent.children[0].innerHTML = '' +
                '<button class="btn btn-default col-xs-5 update"><span class="glyphicon glyphicon-pencil"></span></button>' +
                '<button onclick="window.location= \'/api/deleate/89295700533\'" class="btn btn-danger col-xs-5 deleate"><span class="glyphicon glyphicon-trash"></span></button>' +
                '';
            let sel = parent.querySelectorAll('input.change');
            for (let s of sel) s.disabled = true
        }
    });
    let search = document.querySelector('.input-search');
    search.addEventListener('keyup', function (e) {
        let list = document.querySelector('table').querySelectorAll('input.change');
        var button = false;
        if(val != e.target.value) document.querySelectorAll('tr').forEach(val => {val.style.display = 'table-row'});
        val = e.target.value;
        list.forEach((val, i) => {
            if (i + 1 < list.length && list[i + 1].offsetParent != null && list[i].offsetParent.parentElement == list[i + 1].offsetParent.parentElement) {
                if (val.value.indexOf(e.target.value) + 1) {
                    button = true;
                }
            }else if(i + 1 < list.length && list[i + 1].offsetParent != null && list[i].offsetParent.parentElement != list[i + 1].offsetParent.parentElement){
                if (val.value.indexOf(e.target.value) + 1) {
                    button = true;
                }
                if (!button) list[i].offsetParent.parentElement.style.display = 'none';
                button = false;
            }else{
                if (!button) list[i].offsetParent.parentElement.style.display = 'none';
            }

            // else parent.style.display = 'table-row';
        });
    })
});