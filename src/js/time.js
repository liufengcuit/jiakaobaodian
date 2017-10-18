export function time(){
	var time = new Date();
	var year = time.getFullYear();
	var month = time.getMonth();
	var date = time.getDate();
	var day = time.getDay();

	var week_arr=['日','一','二','三','四','五','六'];
	// console.log(week_arr[day]);
	var obj = {
		year:year+'年',
		month:month+1+'月',
		date:date+'日',
		week:'星期'+week_arr[day]
	}
	return obj;
}