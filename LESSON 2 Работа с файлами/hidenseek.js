var fs = require('fs');
function hide(a, b){
    var mass = [];
    var l = 0;
    for(var i in b){
        if(typeof b[i] == "number"){
            let name = {};
            name[i] = b[i];
            mass.push(name);
            l++;
        }
    }
    mass.sort((a, b) => Math.random() - 0.5);
    let Pokemon = mass[0];
    for(var j in Pokemon) {
        var name = j;
        var level = Pokemon[j];
    }
    fs.writeFile(`./${a}/pokemon.txt`, `${name}|${level}`, (err) => {
        if(err) return console.error(err);
        console.log(`Спрятан покемон: ${name}|${level} в папке ${a}`);
    });
}
function seek(a = '', list) {
    function getTxt(callback){
        let mass = [];
        let pokemons = [];
        let time = [];
        fs.readdir(`./${a}`, function(err, files) {
            if(err) return console.error(err);
            files.forEach(file => !isNaN(+file)?mass.push(+file):false);
            for(var i = 0; i < mass.length; i++){
                let timer = i;
                fs.readdir(`./0${mass[i]}`, function(err, files) {
                    if(err) return console.error(err);
                    files.forEach(file => pokemons.push(`./0${mass[timer]}/${file}`));
                    time.push(timer);
                    callback(null, time.length, mass.length, pokemons);
                });
            }
        });
    }
    getTxt((err, t, m, pok) =>  {
        if(err) return console.error(err);
        if(t == m){
            function addList(callback){
                let time = [];
                for(var i = 0; i < pok.length; i++){
                    let timer = i;
                    fs.readFile(pok[timer], 'utf-8', (err, data) => {
                        if (err) throw err;
                        let dataT = data.split('|');
                        list.add(dataT[0], +dataT[1]);
                        time.push(timer);
                        callback(null, list, time.length, pok.length);
                    });
                }
            }
            addList((err, l, time, p) => {
                if(err) return console.error(err);
                if(time == p) l.showList();
            });
        }
    });
}
module.exports = {
    hide,
    seek
}