const modal = document.getElementById('modal-delete')
const close = document.getElementById('modal-close-btn')
const croix = document.getElementById('modal-close-croix')
const tab   = document.getElementById('tab')
const token = document.querySelector('meta[name="csrf-token"]').content
const ok   = document.getElementById('send-delete')
let id = null



if(modal && close && croix && tab && token && ok){

  
  tab.addEventListener('click',e=>{
    e.stopPropagation()
    if(e.target.classList.contains('switch__btn')){
      e.preventDefault()
      if(e.target.classList.contains('activate')){
        modal.querySelector('.title').innerText = 'Activer'
        modal.querySelector('.message').innerText = 'Voulez vous activer ce client ?'
        ok.classList.replace('bg-red-500','bg-green-400')

        ok.classList.replace('hover:bg-red-700','hover:bg-green-700')
        ok.innerText = "Activer"
      }else{
        modal.querySelector('.title').innerText = 'Confirmer'
        modal.querySelector('.message').innerText = 'Voulez vous vraiment supprimer ce client ?'
        ok.classList.replace('bg-green-400','bg-red-500')

        ok.classList.replace('hover:bg-green-700','hover:bg-red-700')
        ok.innerText = "Supprimer"
      }
      modal.classList.remove('pointer-events-none')
      modal.classList.remove('opacity-0')

      modal.classList.add('pointer-events-auto')
      modal.classList.add('opacity-1')

      id = +e.target.dataset.id
    }
  })

  close.addEventListener('click',e=>{
    modal.classList.add('pointer-events-none')
    modal.classList.add('opacity-0')

    modal.classList.remove('pointer-events-auto')
    modal.classList.remove('opacity-1')
  })

  croix.addEventListener('click',e=>{
    modal.classList.add('pointer-events-none')
    modal.classList.add('opacity-0')

    modal.classList.remove('pointer-events-auto')
    modal.classList.remove('opacity-1')
  })

  ok.addEventListener('click',e=>{
    fetch(`client/${id}`,{
      headers : {
        'Content-Type' : 'application/json',
        'X-CSRF-TOKEN' : token
      },
      method : 'delete',
      body   : JSON.stringify({id})
    }).then(response => {
      response.json().then(response => {
        console.log(response)
        if(response.data == 'success'){
          window.location = '/client'
        }
      })
    }).catch(error=>console.log(error))
  })
}