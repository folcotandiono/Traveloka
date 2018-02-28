function addZero(n) {
	if (n < 10) n = '0' + n;
	return n;
}

function formatTanggalKeJam(tanggal) {
	tanggal = new Date(tanggal);
	var hour = tanggal.getHours();
	var minute = tanggal.getMinutes();
	return addZero(hour) + " : " + addZero(minute);
}

function formatMenitKeJam(n) {
	var jam = parseInt(n / 60);
	var menit = n % 60;
	if (jam > 0) {
		return jam + " jam " + menit + " menit";
	}
	else return menit + " menit";
}

function formatKeRupiah(n) {
	n = parseInt(n);
	return "Rp. " + n.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
}