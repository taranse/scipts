'use strict';
var itemName,
	  itemPrise;
itemName = "Телепорт бытовой VZHIH-101";
itemPrise = 10000;
console.log(`В наличии имеется: "${itemName}"`);
console.log(`Стоимость товара  ${itemPrise} Q`);

var sumOrder = 2 * (10000 * 0.9);
console.log(`Цена покупки двух телепортов составит  ${sumOrder} Q`);

var countMoney = 52334224;
var onceTeleport = 6500;
var rest = countMoney % onceTeleport;

console.log(`Мы можем закупить ${(countMoney - rest)/onceTeleport} единиц товара, после закупки на счету останется ${rest} Q`);
//Можно было добавить что выражения можно подставлять в данный вид конкатенации