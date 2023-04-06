const app = (() => {

    const ajax = (url, callback, method = 'get', data = {}) => {
      console.log(url)
        const options = {
            method:method,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]'
                ).content,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        }



        fetch(url, options)
            .then((response) => response.json())
            .then((result)=>{
                callback(result);
        })

    }
    const deleteRecord = () => {
        const deletes = document.querySelectorAll('.delete');
        deletes.forEach(function(value, key){
            value.addEventListener('click', function(event){
            event.preventDefault();

    const callback = (result) => {
      const deletable = event.target.dataset.deletable ?? 'tr';
        event.target.closest(deletable).remove();
        console.log(result.data.price);
        if(result.data.price){
            console.log(result.data.price);
            const priceInput = document.querySelector('#price_total');
            document.querySelector('#price_total').innerText = `Total: ${result.data.price} Eur`;
        }else{
            document.querySelector('#price_total').innerText = `Total: 0 Eur`;
        }
    }
            ajax(event.target.href, callback, 'delete');
            });
        });
        
    }

const inputInit=()=>{
  bsCustomFileInput.init();
};


    return {
        init: () => {
            deleteRecord()
        },
    };

})();

app.init();