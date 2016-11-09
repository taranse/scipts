class PokemonList extends Array{
    constructor(...list) {
        super();
        list.forEach(item => this.push(item));
    }
    add(...list) {
        this.push({name:list[0],level:list[1]})
    }
    move(names, list){
        this.forEach((item, i) => {
            if (item.name == names) {
                list.push({name: item.name,level:item.level});
                delete this[i];
            }
        });
    }
    showList(){
        let mass = [];
        this.forEach(item => Number.isInteger(item.level) ? mass.push(` ${item.name} - ${item.level}`) : false);
        console.log(`Количество покемонов в списке: ${mass.length}\n ${mass}`);
    }
    max(){
        let mass = [];
        this.forEach(item => Number.isInteger(item.level) ? mass.push(item.level) : false);
        this.valueOf = () => Math.max(...mass);
        console.log(+this)
    }
}
module.exports = {PokemonList};