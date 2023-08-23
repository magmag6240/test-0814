document.querySelector('.api-address').addEventListener('click', () => {
        const elem = document.querySelector('#zip');
        const zip = elem.value;
        fetch('../api/address/' + zip)
            .then((data) => data.json())
            .then((obj) => {
                if (!Object.keys(obj).length) {
                    
                    txt = '住所が存在しません。'
                } else {
                    
                    txt = obj.pref + obj.city + obj.town;
                }
    
                document.querySelector('#address').value = txt;
            });
});
    

(() => {

    const _attribute = 'data-inputAssist';
    const _inputAssistElms = document.querySelectorAll('[' + _attribute + ']');
    //
    init();

    function init() {
        _inputAssistElms.forEach((elm) => {
            const actionStr = elm.getAttribute(_attribute);
            const actions = actionStr.split(',');
            actions.forEach((act) => {
                if (act == '') {
                    //nothing
                } else if (act == 'email') {
                    elm.addEventListener('blur',() => {validateEmail(elm);});
                } else if (act == 'postal') {
                    elm.addEventListener('blur',() => {validatePostal(elm);});
                }
                
            });
        });
    }

    // '435-0054'形式の郵便番号
    function validatePostal(elm) {
        const src = elm.value;
        let dst = safetyHyphenNum(elm.value);
        elm.value = dst;
        if (src.length != dst.length) {
            flashElement(elm);
        }
        if (dst.length == 0) {
            elm.style.color = 'black';
            return;
        }
        if (dst[3] != '-') {    //'4350054' --> '435-0054'
            const num = safetyNum(elm.value);
            if (num.length == 7) {
                dst = num.substr(0,3) + '-' + num.substr(3,4);
                elm.value = dst;
            }
        }
        if (dst.match(/^[0-9]{3}-[0-9]{4}$/) == null) {
            elm.style.color = 'red';
            return;
        }
        elm.style.color = 'black';
    }

    // メールアドレス形式
    function validateEmail(elm) {
        const src = elm.value;
        const dst = safetyEmail(elm.value);
        elm.value = dst;
        if (src.length != dst.length) {
            flashElement(elm);
        }
        if (dst.length == 0) {
            elm.style.color = 'black';
            return;
        }
        elm.style.color = isMail(dst) ? 'black' : 'red';
    }

    //文字列をハイフンと数字だけにする
    function safetyHyphenNum(str) {
        const replaceFm = ['０','１','２','３','４','５','６','７','８','９','ー','－','/','---','--'];
        const replaceTo = ['0','1','2','3','4','5','6','7','8','9','-','-','-','-','-'];
        str = replaceStr(str,replaceFm,replaceTo);
        str = inArrayStr(str,replaceTo);
        return str;
    }

    //ハイライトして戻す
    function flashElement(elm) {
        elm.style.boxShadow = '0 0 15px red';
        setTimeout(() => { elm.style.boxShadow = ''; },300);
    }


    //文字列を、配列の中に含まれている文字だけにする
    function inArrayStr(str,searchAry) {
        const strAry = str.split('');
        let result = '';
        for (let i = 0; i < strAry.length; i++) {
            if (inArray(strAry[i],searchAry)) {
                result += String(strAry[i]);
            }
        }
        return result;
    }

    //メールアドレス文字列から不正な記号を取り去る
    function safetyEmail(str) {
        const replaceFm = ['＠','。','．','＿','－','ー','＋','＊',
            '０','１','２','３','４','５','６','７','８','９',
            'ａ','ｂ','ｃ','ｄ','ｅ','ｆ','ｇ','ｈ','ｉ','ｊ','ｋ','ｌ','ｍ',
            'ｎ','ｏ','ｐ','ｑ','ｒ','ｓ','ｔ','ｕ','ｖ','ｗ','ｘ','ｙ','ｚ',
            'Ａ','Ｂ','Ｃ','Ｄ','Ｅ','Ｆ','Ｇ','Ｈ','Ｉ','Ｊ','Ｋ','Ｌ','Ｍ',
            'Ｎ','Ｏ','Ｐ','Ｑ','Ｒ','Ｓ','Ｔ','Ｕ','Ｖ','Ｗ','Ｘ','Ｙ','Ｚ',
        ];
        const replaceTo = ['@','.','.','_','-','-','+','*',
            '0','1','2','3','4','5','6','7','8','9',
            'a','b','c','d','e','f','g','h','i','j','k','l','m',
            'n','o','p','q','r','s','t','u','v','w','x','y','z',
            'A','B','C','D','E','F','G','H','I','J','K','L','M',
            'N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
        ];
        str = replaceStr(str,replaceFm,replaceTo);
        str = inArrayStr(str,replaceTo);
        return str;
    }

    //文字列をハイフンと数字だけにする
    function safetyHyphenNum(str) {
        const replaceFm = ['０','１','２','３','４','５','６','７','８','９','ー','－','/','---','--'];
        const replaceTo = ['0','1','2','3','4','5','6','7','8','9','-','-','-','-','-'];
        str = replaceStr(str,replaceFm,replaceTo);
        str = inArrayStr(str,replaceTo);
        return str;
    }

     //文字置換
    function replaceStr(str,replaceFm,replaceTo) {
        for (let i = 0; i < replaceFm.length; i++) {
            str = str.replace(new RegExp(replaceFm[i], 'g'),replaceTo[i]);
        }
        return str;
    }

    //文字列を数字だけにする
    function safetyNum(str) {
        const replaceFm = ['０','１','２','３','４','５','６','７','８','９'];
        const replaceTo = ['0','1','2','3','4','5','6','7','8','9'];
        str = replaceStr(str,replaceFm,replaceTo);
        str = inArrayStr(str,replaceTo);
        return str;
    }

    //メールアドレスかどうか
    function isMail(str) {
        if (str.match(/^([a-zA-Z0-9])+([a-zA-Z0-9_\.\-\+\*])*@([a-zA-Z0-9_\-])+([a-zA-Z0-9_\.\-]+)+$/) == null) {
            return false;
        }
        if (str.match(/[^a-zA-Z0-9_@\.\-\+\*]/) != null) {    //全角や普段使わない記号は排除
            return false;
        }
        if (str.match(/\.[a-z]+$/) == null) {    //～.com ～.co.jp などの末尾チェック
            return false;
        }
        if (str.match(/\.\./) != null) {    //ドットの連続
            return false;
        }
        if (str.match(/\.@/) != null) {    // @の前にドット
            return false;
        }
        return true;
    }

})();