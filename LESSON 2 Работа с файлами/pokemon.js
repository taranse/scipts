class Pokemon {
    constructor(...list) {
    let [name, level, ] = list;
    this.name = name;
    this.level = level;
}
show(name) {
    if (this.name == name){
        console.log(`Покемон: ${this.name},\nУровень: ${this.level}
          `);
    }
}
set levelUp(name) {
    if (this.name == name)
        this.level += 1;
}
}
module.exports = {Pokemon};