<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_laozhoubuluo_threadflow {

}

class plugin_laozhoubuluo_threadflow_forum extends plugin_laozhoubuluo_threadflow {

	public function forumdisplay_bottom() {
		global $_G;

		if(!$_G['cache']['plugin']['laozhoubuluo_threadflow']['status']) {
			return '';
		}

		return "
<script type=\"text/javascript\">
	if(window.addEventListener) {
		window.addEventListener('scroll', function(e) {
			var autopbn = document.getElementById('autopbn');
			if(autopbn && autopbn.getBoundingClientRect() && autopbn.getBoundingClientRect().bottom < {$_G['cache']['plugin']['laozhoubuluo_threadflow']['position']} + window.innerHeight) {
				if(autopbn.click) {
					autopbn.click();
				} else if(document.createEvent) {
					var eObj = document.createEvent('MouseEvents');
					eObj.initEvent('click', true, true);
					autopbn.dispatchEvent(eObj);
				}
			}
		});
	}
</script>
";
	}

}