var fs = require('fs');
function hide(a = 123, b){
    console.log(a);
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
                        fs.writeFile(pok[timer], '', (err) => {
                            if(err) return console.error(err);
                        });
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