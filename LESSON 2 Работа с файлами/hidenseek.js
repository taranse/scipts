var fs = require('fs');
function hide(a, b){
    let mass =[];
    readDir((err, mass, list=false) => {
        if(err) return console.error(err);
        fs.readdir(a, function(err, files) {
            if(err) return console.error(err);
            files.forEach(file => {
                fs.writeFile(a+file, mass, (err) => {
                    if (err) throw err;
                    console.log(`Покемоны успешно спрятаны в папке ${a}`);
                });
            });
        });
    });
    function readDir(callback){
        if(typeof b == 'string'){
            fs.readFile(b, { encoding: 'utf8' }, (err, content) => {
                if(err) return console.error(err);
                content = JSON.parse(content);
                for(var i in content){
                    mass.push(content[i].name+'|'+content[i].level);
                }
                callback(null, mass);
            });
        }else if(b){
            b.forEach(i => mass.push(i.name+'|'+i.level));
            mass.sort((a,b) => Math.random() - 0.5);
            callback(null, mass[0], true);
        }else{
            console.log("Выберете файл со списком покемонов");
        }
    }

}

function seek(a = './', list) {
    function getTxt(callback){
        let mass = [];
        let pokemons = [];
        let time = [];
        fs.readdir(a, function(err, files) {
            if(err) return console.error(err);
            if(a == './') {
                files.forEach(file => !isNaN(+file) ? mass.push(+file) : false);
                for (var i = 0; i < mass.length; i++) {
                    let timer = i;
                    fs.readdir(`./0${mass[i]}`, function (err, files) {
                        if (err) return console.error(err);
                        files.forEach(file => pokemons.push(`./0${mass[timer]}/${file}`));
                        time.push(timer);
                        callback(null, time.length, mass.length, pokemons);
                    });
                }
            }else{
                fs.readFile(a+files[0], { encoding: 'utf8' }, (err, content) => {
                    if(err) return console.error(err);
                    if(content != ""){
                        content = content.split(',');
                        console.log('Были найдены покемоны:');
                        callback(null, false, 0, content);
                    }
                });
            }
        });
    }
    getTxt((err, t, m, pok) =>  {
        if(err) return console.error(err);
        if(t === m){
            function addList(callback){
                let time = [];
                for(var i = 0; i < pok.length; i++){
                    let timer = i;
                    fs.readFile(pok[timer], 'utf-8', (err, data) => {
                        if (err) throw err;
                        let dataT = data.split('|');
                        time.push(timer);
                        callback(null, list, time.length, pok.length);
                    });
                }
            }
            addList((err, l, time, p) => {
                if(err) return console.error(err);
                if(time == p) l.showList();
            });
        }else if(t === false){
            pok.forEach(i=>console.log(i));
        }
    });
}
module.exports = {
    hide,
    seek
};