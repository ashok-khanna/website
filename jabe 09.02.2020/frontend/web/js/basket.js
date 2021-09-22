function addStorage(id, e) {    
  e.preventDefault();
  let data = [];
  let is_exists = false;
  if (localStorage.getItem('services') != null) {
    data = JSON.parse(localStorage.getItem('services'));
    $.each(data, function (index, value) {
      if (id == value) {
        is_exists = true;
        return false;
      }
    });    
  }
  if (!is_exists) {
    data.push(id);
  }
  localStorage.setItem('services', JSON.stringify(data));
}

function removeStorage(id, e) {
  e.preventDefault();
  let data = [];
  if (localStorage.getItem('services') != null) {
    data = JSON.parse(localStorage.getItem('services'));
    $.each(data, function (index, value) {
      if (id == value) {
        data.splice(index, 1); 
      }
    });    
    localStorage.setItem('services', JSON.stringify(data));    
  }      
}

function removeService(id, e, item) {
  e.preventDefault();
  removeStorage(id, e);
  let cost = $(item).parent().parent().find('.PriceItem').data('id');
  let pre = $(item).parent().parent().find('.PriceItem').data('pre');
  if (cost != null) {    
    let preCalc = preCostCalc(cost, pre)
    let sumCost = $('.TotalSum').data('id');
    let preCost = $('.PreSum').data('id');
    let totItem = $('.TotalItem').first().text();         
    sumCost = parseInt(sumCost) - parseInt(cost);
    preCost = parseInt(preCost) - parseInt(preCalc);
    totItem = parseInt(totItem) - parseInt(1);
    setTotalCosts(sumCost)
    setPreSum(preCost)
    setTotalItem(totItem)

  }
  $(item).parent().parent().remove();
}

function getAll() {
  return JSON.parse(localStorage.getItem('services'))
}

function preCostCalc(cost, percentId) {
  if (percentId === 1) {
    return parseInt((parseInt(15) * parseInt(cost))/100);
  }
  else if (percentId === 2) {
    return parseInt((parseInt(20) * parseInt(cost))/100);
  }
  else if (percentId === 3) {
    return parseInt((parseInt(30) * parseInt(cost))/100);
  }  
}

function setTotalCosts(sum) {
  $('.TotalSum').text(sum + '$')
  $('.TotalSum').data('id', sum)    
}

function setPreSum(pre) {
  $('.PreSum').text(pre + '$')
  $('.PreSum').data('id', pre)  
}

function setTotalItem(count) {
  $('.TotalItem').text(count != null ? count : '0')
}

$(document).ready(function () {
  let lang = $('html').attr('lang');
  let urlRoute = lang != 'ru' ? '/' +lang+'/site/basket' : '/site/basket'
  if (localStorage.getItem('services') != null && window.location.pathname == urlRoute) {
    let containerM = $('.ServiceProductM')
    let container = $('.ServiceProduct')
    let sumCost = 0;
    let preCost = 0;
    containerM.empty();
    container.empty();
    $.ajax({
      type: 'POST',
      url: (lang != 'ru' ? '/' + lang : '') + '/site/getservices',
      data: { 'data': localStorage.getItem('services') },
      success: function (data) {        
        if (data != null) {
          data.forEach(function (item) {
            container.append('<tr>' +
              '<td class="basketItemTitle gradient-title-2">' + (lang == "ru" ? item['name_rus'] : item['name_eng']) + '</td>' +
              '<td class="gradient-title-2 PriceItem" data-pre=' + item['prepayment'] + ' data-id=' + item['cost'] + '>' + item['cost'] + ' $</td>' +
              '<td class="deleteBasketItemImg"><a href="#" onclick="removeService(' + item['id'] + ',event,this )"><img src="/img/deleteBasketItemImg.png" alt="img"></a></td>' +
              '</tr>');
            containerM.append('<tr>' +
              '<td class="basketItemTitleM gradient-title-2" >' + (lang == "ru" ? item['name_rus'] : item['name_eng']) + '</td >' +
              '<td class="basketItemPriceM gradient-title-2 PriceItem" data-pre=' + item['prepayment'] + ' data-id=' + item['cost'] + '>' + item['cost'] + '$</td>' +
              '<td class="deleteBasketItemImgM"><a href="#" onclick="removeService(' + item['id'] + ',event, this )"><img src="/img/mobile/deleteBasketItemImgM.png" alt="img"></a></td>' +
              '</tr>');          
            sumCost += parseInt(item['cost']);
            preCost += preCostCalc(item['cost'], item['prepayment']);
          })
        }
        setTotalCosts(sumCost)
        setPreSum(preCost)
        setTotalItem(data.length)
      }
    })
  }
})