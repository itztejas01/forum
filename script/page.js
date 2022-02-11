console.log("hello");

const ultag=document.querySelector("ul");

function element(totalpage,page){
    let litag='';
    if (page>1){
        litag=`<li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>`;
    }
    ultag.innerHTML=litag;
}
element(20,5);