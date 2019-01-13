var MERCHANTS_API = 'https://www.stcpay.com.sa/challenge/merchants';

var $languageContainer = $('#language-container');
var $contentContainer = $('#content-container');

var isRtlEnabled = localStorage.getItem('isRTL');

if (isRtlEnabled) $contentContainer.addClass('rtl');

$languageContainer.on('click', function() {
  if (isRtlEnabled) {
    localStorage.setItem('isRTL', '');
  } else {
    localStorage.setItem('isRTL', 'true');
  }
  
  $contentContainer.toggleClass('rtl');
});

var $map = $('#map');

if ($map) {
  var map = new GMaps({
    div: '#map',
    lat: 24.759324,
    lng: 46.738326,
    zoom: 13
  });
  
  function updateMerchantPins(merchantsData) {
    $.post(MERCHANTS_API, merchantsData, function(response) {
      merchants = (response.items || []).forEach(merchant => {
        map.addMarker({
          lat: merchant.address.latitude || '',
          lng: merchant.address.longitude || '',
          icon: {
            url: merchant.category.imageUrlPin || '',
            scaledSize: new google.maps.Size(34, 46)
          },
          infoWindow: {
            content: 
            `
              <div class="info__container">
                <img src="${merchant.imageUrl || ''}" alt="merchant logo" class="info__logo"/>
                <p class="info__title">${merchant.brandName}</p>
                <p class="info__description">${merchant.category.desc}</p>
              </div>
            `
          }
        });
      });
    }, 'json');
  }
  
  updateMerchantPins({
    nearLatitude: 24.759324,
    nearLongitude: 46.738326,
    nearDistance: 1,
    limit: 100
  });
}