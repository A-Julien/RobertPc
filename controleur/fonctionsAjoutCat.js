var numAttr = 0;

function ajout() {
  numAttr ++;
  
  var zoneAttr = document.getElementById('zoneAttr');

  var nomAttr = document.createElement('input');
  nomAttr.setAttribute('type', 'text');
  nomAttr.setAttribute('name', 'nomAttr' + numAttr );
  nomAttr.setAttribute('id', 'nomAttr' + numAttr);
  nomAttr.setAttribute('placeholder', 'Nom de l\'attribut');
  nomAttr.setAttribute('value', '');

  var typeAttr = document.createElement('input');
  typeAttr.setAttribute('type', 'text');
  typeAttr.setAttribute('name', 'typeAttr' + numAttr );
  typeAttr.setAttribute('id', 'typeAttr' + numAttr);
  typeAttr.setAttribute('placeholder', 'Type de l\'attribut');
  typeAttr.setAttribute('value', '');

  zoneAttr.appendChild(document.createElement('br'));
  zoneAttr.appendChild(nomAttr);
  zoneAttr.appendChild(typeAttr);
}
