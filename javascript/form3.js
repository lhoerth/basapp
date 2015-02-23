document.getElementById('buttons').style.display = 'block';

var main = function() {
    document.getElementById('ss').style.display = 'none';
    document.getElementById('nn').style.display = 'none';
    document.getElementById('uu').style.display = 'none';
    document.getElementById('buttons').style.display = 'none';
}

function yesnoCheck() {
    if (document.getElementById('software').checked) {
        document.getElementById('ss').style.display = 'block';
         document.getElementById('nn').style.display = 'none';
           document.getElementById('uu').style.display = 'none';
    
    }
    else if ((document.getElementById('network').checked)) {
     document.getElementById('ss').style.display = 'none';
         document.getElementById('nn').style.display = 'block';
           document.getElementById('uu').style.display = 'none';
    }
    document.getElementById('buttons').style.display = 'block';
}

$(document).ready(main);