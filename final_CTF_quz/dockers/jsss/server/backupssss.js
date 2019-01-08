//CTF{well done><}
// function a(){
// this.edcode =function (de){
// var key   = 3;
// var ctext = de;
// var plain = "";
//
//
// for( var i = 0; i < ctext.length; i ++ ) {
//    var ccode = ctext.charCodeAt( i );
//    var pcode = ccode;
//    if ( ccode >= 65 && ccode <= 90 ) {
//        pcode = ( ( ccode - 65 ) - key * 1 +26 ) % 26 + 65;
//    }
//    if ( ccode >= 97 && ccode <= 122 ) {
//        pcode = ( ( ccode - 97 ) - key * 1 + 26) % 26 + 97;
//    }
//    // console.log(ccode + "," + pcode);
//    plain += String.fromCharCode(pcode);
// }
//  reobj = JSON.parse(atob(plain));
//  return reobj.message;
// }
//
// }
// function do_encrypt() {
//     var key   = document.cipher.offset.value;
//     // console.log(key);
//     var plain = document.cipher.plain.value;
//     var ctext = "";
//
//     // do the encoding
//     for( var i = 0; i < plain.length; i ++ ) {
//         var pcode = plain.charCodeAt( i );
//         var ccode = pcode;
//         if ( pcode >= 65 && pcode <= 90 ) {
//             ccode = ( ( pcode - 65 ) + key * 1 ) % 26 + 65;
//         }
//         if ( pcode >= 97 && pcode <= 122 ) {
//             ccode = ( ( pcode - 97 ) + key * 1 ) %26 + 97;
//         }
//         // console.log(pcode + "," + ccode);
//         ctext += String.fromCharCode(ccode);
//     }
//
//     document.cipher.enc.value = ctext;
// }
//
//function do_decrypt() {
    //     var key   = document.cipher.offset.value;
    //     // console.log(key);
    //     var ctext = document.cipher.enc.value;
    //     var plain = "";
    //
    //     // do the encoding
    //     for( var i = 0; i < ctext.length; i ++ ) {
    //         var ccode = ctext.charCodeAt( i );
    //         var pcode = ccode;
    //         if ( ccode >= 65 && ccode <= 90 ) {
    //             pcode = ( ( ccode - 65 ) - key * 1 +26 ) % 26 + 65;
    //         }
    //         if ( ccode >= 97 && ccode <= 122 ) {
    //             pcode = ( ( ccode - 97 ) - key * 1 + 26) % 26 + 97;
    //         }
    //         // console.log(ccode + "," + pcode);
    //         plain += String.fromCharCode(pcode);
    //     }
    //     // console.log(-3 % 26);
    //
    //     document.cipher.plain.value = plain;
    // }
    //

//var encode_version = 'sojson.v4';var __0x2042a=['FxM6w5vCmw==','UCEvwopS','HsKew67CtMKOVcK3','NF/Cn8K/wrJo','woAvwoJNw4LCjg==','TcOzw5oDH3nCiA4PWA==','fsOZWUjDkg==','B0dbwrLCig==','YcOHworDt8OW','aMOow4o1Pg==','C0DClyAy','w7kVOxRt','w4HDsMOcCi8=','w5MyJTxl','w4EpCA7DnQ==','LEs2wqrCkw8ew48qSF3CnQ=='];(function(_0x47ca6a,_0x5e9749){var _0x286c85=function(_0x59a921){while(--_0x59a921){_0x47ca6a['push'](_0x47ca6a['shift']());}};_0x286c85(++_0x5e9749);}(__0x2042a,0x123));var _0x56ae=function(_0x2abd8c,_0x4cc9a3){_0x2abd8c=_0x2abd8c-0x0;var _0x5c8beb=__0x2042a[_0x2abd8c];if(_0x56ae['initialized']===undefined){(function(){var _0x2f5dcd=typeof window!=='undefined'?window:typeof process==='object'&&typeof require==='function'&&typeof global==='object'?global:this;var _0x4a174c='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';_0x2f5dcd['atob']||(_0x2f5dcd['atob']=function(_0x11c2db){var _0xe335fd=String(_0x11c2db)['replace'](/=+$/,'');for(var _0x1bf816=0x0,_0x12a614,_0x51ddb4,_0xb6bed8=0x0,_0x4e0de3='';_0x51ddb4=_0xe335fd['charAt'](_0xb6bed8++);~_0x51ddb4&&(_0x12a614=_0x1bf816%0x4?_0x12a614*0x40+_0x51ddb4:_0x51ddb4,_0x1bf816++%0x4)?_0x4e0de3+=String['fromCharCode'](0xff&_0x12a614>>(-0x2*_0x1bf816&0x6)):0x0){_0x51ddb4=_0x4a174c['indexOf'](_0x51ddb4);}return _0x4e0de3;});}());var _0x74243b=function(_0x21245c,_0x1a01ce){var _0x1d8a2e=[],_0x568953=0x0,_0x20aa2e,_0x425e7b='',_0x45e68d='';_0x21245c=atob(_0x21245c);for(var _0x57403d=0x0,_0x13628a=_0x21245c['length'];_0x57403d<_0x13628a;_0x57403d++){_0x45e68d+='%'+('00'+_0x21245c['charCodeAt'](_0x57403d)['toString'](0x10))['slice'](-0x2);}_0x21245c=decodeURIComponent(_0x45e68d);for(var _0x32a1af=0x0;_0x32a1af<0x100;_0x32a1af++){_0x1d8a2e[_0x32a1af]=_0x32a1af;}for(_0x32a1af=0x0;_0x32a1af<0x100;_0x32a1af++){_0x568953=(_0x568953+_0x1d8a2e[_0x32a1af]+_0x1a01ce['charCodeAt'](_0x32a1af%_0x1a01ce['length']))%0x100;_0x20aa2e=_0x1d8a2e[_0x32a1af];_0x1d8a2e[_0x32a1af]=_0x1d8a2e[_0x568953];_0x1d8a2e[_0x568953]=_0x20aa2e;}_0x32a1af=0x0;_0x568953=0x0;for(var _0x4f2822=0x0;_0x4f2822<_0x21245c['length'];_0x4f2822++){_0x32a1af=(_0x32a1af+0x1)%0x100;_0x568953=(_0x568953+_0x1d8a2e[_0x32a1af])%0x100;_0x20aa2e=_0x1d8a2e[_0x32a1af];_0x1d8a2e[_0x32a1af]=_0x1d8a2e[_0x568953];_0x1d8a2e[_0x568953]=_0x20aa2e;_0x425e7b+=String['fromCharCode'](_0x21245c['charCodeAt'](_0x4f2822)^_0x1d8a2e[(_0x1d8a2e[_0x32a1af]+_0x1d8a2e[_0x568953])%0x100]);}return _0x425e7b;};_0x56ae['rc4']=_0x74243b;_0x56ae['data']={};_0x56ae['initialized']=!![];}var _0x3b01a8=_0x56ae['data'][_0x2abd8c];if(_0x3b01a8===undefined){if(_0x56ae['once']===undefined){_0x56ae['once']=!![];}_0x5c8beb=_0x56ae['rc4'](_0x5c8beb,_0x4cc9a3);_0x56ae['data'][_0x2abd8c]=_0x5c8beb;}else{_0x5c8beb=_0x3b01a8;}return _0x5c8beb;};function a(){var _0x3653c0={'jOMxl':function _0x19c1c6(_0x431dcf,_0x461db8){return _0x431dcf>=_0x461db8;},'GhFlG':function _0x1b849e(_0x5bc306,_0x2953b4){return _0x5bc306<=_0x2953b4;},'FwUKf':function _0x17bae8(_0x481c3b,_0x36f360){return _0x481c3b+_0x36f360;},'HIiks':function _0x25c7d7(_0x387725,_0x557430){return _0x387725-_0x557430;},'FsqDb':function _0x369409(_0x3cef8a,_0x154839){return _0x3cef8a-_0x154839;},'fHkHi':function _0x5506ba(_0x5adc96,_0x40dbb3){return _0x5adc96*_0x40dbb3;},'IQafG':function _0x2aa57f(_0x2ad816,_0x50b8a6){return _0x2ad816+_0x50b8a6;},'woYgs':function _0x5d52f1(_0x42b5dd,_0xb171e4){return _0x42b5dd(_0xb171e4);}};this[_0x56ae('0x0','QcW)')]=function(_0x37f6cc){var _0x4d04c8=0x3;var _0x52628e=_0x37f6cc;var _0x473fdc='';for(var _0xb3795a=0x0;_0xb3795a<_0x52628e[_0x56ae('0x1','z*&T')];_0xb3795a++){var _0x1a69dd=_0x52628e[_0x56ae('0x2','gQAR')](_0xb3795a);var _0x445e25=_0x1a69dd;if(_0x3653c0[_0x56ae('0x3','HF1d')](_0x1a69dd,0x41)&&_0x3653c0[_0x56ae('0x4',']*tT')](_0x1a69dd,0x5a)){_0x445e25=_0x3653c0['FwUKf'](_0x3653c0[_0x56ae('0x5','xFq%')](_0x3653c0[_0x56ae('0x6','gQAR')](_0x1a69dd,0x41),_0x3653c0[_0x56ae('0x7','vvCT')](_0x4d04c8,0x1)),0x1a)%0x1a+0x41;}if(_0x3653c0[_0x56ae('0x8','Ob@e')](_0x1a69dd,0x61)&&_0x3653c0['GhFlG'](_0x1a69dd,0x7a)){_0x445e25=_0x3653c0[_0x56ae('0x9','S%0]')](_0x3653c0[_0x56ae('0xa','YJHY')](_0x3653c0[_0x56ae('0xb','YJp6')](_0x1a69dd,0x61)-_0x4d04c8*0x1,0x1a)%0x1a,0x61);}_0x473fdc+=String[_0x56ae('0xc','DFTS')](_0x445e25);}reobj=JSON[_0x56ae('0xd','TdQZ')](_0x3653c0[_0x56ae('0xe','N@R3')](atob,_0x473fdc));return reobj[_0x56ae('0xf','0plF')];};};encode_version = 'sojson.v4';
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('2 1j=\'16.1g\';2 y=[\'1J==\',\'1R\',\'1I\',\'1L/1M/1O\',\'1H==\',\'1P==\',\'1G==\',\'1F==\',\'1D\',\'1E==\',\'1B\',\'1C\',\'1N=\',\'25\',\'20==\',\'1Z==\'];(4(B,1r){2 1q=4(1k){21(--1k){B[\'22\'](B[\'24\']())}};1q(++1r)}(y,23));2 1=4(f,12){f=f-7;2 h=y[f];j(1[\'13\']===q){(4(){2 K=m 1m!==\'q\'?1m:m 1X===\'1x\'&&m 1S===\'4\'&&m 1u===\'1x\'?1u:1h;2 1f=\'1V+/=\';K[\'n\']||(K[\'n\']=4(10){2 X=s(10)[\'1W\'](/=+$/,\'\');g(2 p=7,v,d,Z=7,x=\'\';d=X[\'1U\'](Z++);~d&&(v=p%O?v*1T+d:d,p++%O)?x+=s[\'18\'](1Y&v>>(-M*p&1p)):7){d=1f[\'1Q\'](d)}8 x})}());2 15=4(c,L){2 5=[],9=7,k,P=\'\',Q=\'\';c=n(c);g(2 l=7,17=c[\'G\'];l<17;l++){Q+=\'%\'+(\'1K\'+c[\'J\'](l)[\'2d\'](2C))[\'2D\'](-M)}c=2E(Q);g(2 3=7;3<i;3++){5[3]=3}g(3=7;3<i;3++){9=(9+5[3]+L[\'J\'](3%L[\'G\']))%i;k=5[3];5[3]=5[9];5[9]=k}3=7;9=7;g(2 r=7;r<c[\'G\'];r++){3=(3+u)%i;9=(9+5[3])%i;k=5[3];5[3]=5[9];5[9]=k;P+=s[\'18\'](c[\'J\'](r)^5[(5[3]+5[9])%i])}8 P};1[\'19\']=15;1[\'D\']={};1[\'13\']=!![]}2 C=1[\'D\'][f];j(C===q){j(1[\'14\']===q){1[\'14\']=!![]}h=1[\'19\'](h,12);1[\'D\'][f]=h}2F{h=C}8 h};4 a(){2 6={\'2B\':4 2A(1e,1d){8 1e>=1d},\'1s\':4 2w(1b,1c){8 1b<=1c},\'1n\':4 26(R,11){8 R+11},\'2v\':4 2x(U,Y){8 U-Y},\'2y\':4 2z(V,W){8 V-W},\'2H\':4 2N(1a,1o){8 1a*1o},\'2M\':4 2K(1w,1v){8 1w+1v},\'2L\':4 2I(1A,1z){8 1A(1z)}};1h[1(\'7\',\'2J)\')]=4(1t){2 H=1i;2 F=1t;2 E=\'\';g(2 o=7;o<F[1(\'u\',\'z*&T\')];o++){2 b=F[1(\'M\',\'1l\')](o);2 t=b;j(6[1(\'1i\',\'2G\')](b,A)&&6[1(\'O\',\']*2t\')](b,2u)){t=6[\'1n\'](6[1(\'2e\',\'2f%\')](6[1(\'1p\',\'1l\')](b,A),6[1(\'2g\',\'2c\')](H,u)),w)%w+A}j(6[1(\'2b\',\'27@e\')](b,I)&&6[\'1s\'](b,28)){t=6[1(\'29\',\'S%0]\')](6[1(\'2a\',\'2h\')](6[1(\'2i\',\'2p\')](b,I)-H*u,w)%w,I)}E+=s[1(\'2q\',\'2r\')](t)}1y=2s[1(\'2o\',\'2n\')](6[1(\'2j\',\'N@2k\')](n,E));8 1y[1(\'2l\',\'2m\')]}};1j=\'16.1g\';',62,174,'|_0x56ae|var|_0x32a1af|function|_0x1d8a2e|_0x3653c0|0x0|return|_0x568953||_0x1a69dd|_0x21245c|_0x51ddb4||_0x2abd8c|for|_0x5c8beb|0x100|if|_0x20aa2e|_0x57403d|typeof|atob|_0xb3795a|_0x1bf816|undefined|_0x4f2822|String|_0x445e25|0x1|_0x12a614|0x1a|_0x4e0de3|__0x2042a||0x41|_0x47ca6a|_0x3b01a8|data|_0x473fdc|_0x52628e|length|_0x4d04c8|0x61|charCodeAt|_0x2f5dcd|_0x1a01ce|0x2||0x4|_0x425e7b|_0x45e68d|_0x481c3b|||_0x387725|_0x3cef8a|_0x154839|_0xe335fd|_0x557430|_0xb6bed8|_0x11c2db|_0x36f360|_0x4cc9a3|initialized|once|_0x74243b|sojson|_0x13628a|fromCharCode|rc4|_0x5adc96|_0x5bc306|_0x2953b4|_0x461db8|_0x431dcf|_0x4a174c|v4|this|0x3|encode_version|_0x59a921|gQAR|window|FwUKf|_0x40dbb3|0x6|_0x286c85|_0x5e9749|GhFlG|_0x37f6cc|global|_0x50b8a6|_0x2ad816|object|reobj|_0xb171e4|_0x42b5dd|C0DClyAy|w7kVOxRt|YcOHworDt8OW|aMOow4o1Pg|B0dbwrLCig|fsOZWUjDkg|woAvwoJNw4LCjg|HsKew67CtMKOVcK3|FxM6w5vCmw|00|NF|Cn8K|w4HDsMOcCi8|wrJo|TcOzw5oDH3nCiA4PWA|indexOf|UCEvwopS|require|0x40|charAt|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|replace|process|0xff|LEs2wqrCkw8ew48qSF3CnQ|w4EpCA7DnQ|while|push|0x123|shift|w5MyJTxl|_0x17bae8|Ob|0x7a|0x9|0xa|0x8|vvCT|toString|0x5|xFq|0x7|YJHY|0xb|0xe|R3|0xf|0plF|TdQZ|0xd|YJp6|0xc|DFTS|JSON|tT|0x5a|HIiks|_0x1b849e|_0x25c7d7|FsqDb|_0x369409|_0x19c1c6|jOMxl|0x10|slice|decodeURIComponent|else|HF1d|fHkHi|_0x5d52f1|QcW|_0x2aa57f|woYgs|IQafG|_0x5506ba'.split('|'),0,{}))

   b = new a() ;
  // A =
  // reobj = JSON.parse(atob(A));
document.getElementsByName("message")[0].innerHTML = b.edcode(window.DATA);
