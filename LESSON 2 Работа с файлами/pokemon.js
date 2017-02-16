class Pokemon {
    constructor(...list) {
        let [name, level] = list;
        this.name         = name;
        this.level        = level;
    }

    show() {
        console.log(`Покемон: ${this.name} - Уровень: ${this.level}`);
    }

    set levelUp(level) {
        this.level += level;
    }
}
module.exports = {Pokemon};