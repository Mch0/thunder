	refcount=0;
	refcountlast=0;
	function ref_stream() {
		console.log('count : ' + refcount + ' last : ' + refcountlast + ' now: ' + $.now());
		var ref_emb = $('#ref');
		var reffront_emb = $('#ref_front');
		$.ajax({ url: 'http://94.23.235.215/~cast/refresh.php',	cache: false, 
		success : (function(data) { 
			if (data == 'refresh') {
				if(refcount < 12) {
					refcountlast = $.now();
					refcount = refcount+1;
					ref_emb.html(ref_emb.html());
					reffront_emb.html(reffront_emb.html());
				}
			} 
			console.log(data); 
		})});
		setTimeout(ref_stream, 29600);
		if((refcountlast + 600000) < $.now()) {
		refcount=0; }
		return false;
	}
setTimeout(ref_stream, 5000);
