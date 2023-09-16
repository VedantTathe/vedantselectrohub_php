
//            //adding scrollbar to category if its start wrpaing and overflow
//            let category = document.getElementById("category");
//            let cat = document.getElementById("cat");
//            let height = category.offsetHeight;
//
//            if (window.innerWidth => 546 && height > 180 || window.innerWidth < 546 && height >85) {
//                category.style.overflowX = "scroll";
//                cat.style.flexWrap = "nowrap";
//                cat.style.justifyContent = "unset";
//                cat.style.alignItems = "unset";
//            }
//
//            let resizeObserver = new ResizeObserver(() => {
//                if (height != category.offsetHeight) {
//                    category.style.overflowX = "scroll";
//                    cat.style.flexWrap = "nowrap";
//                    cat.style.justifyContent = "unset";
//                    cat.style.alignItems = "unset";
//                }
//            });
//
//            resizeObserver.observe(category);

    //accept only 10 digits in mobile number

    let btn = document.getElementById('registerbtn');
    btn.disabled = true;
    let num = document.getElementById('mnumber');
    //                btn.onmouseover = 'check()';
    check();
    function check() {
        if (num.value.length > 10) {
            num.value = num.value.slice(0, 10);
        } else if (num.value.length == 10) {
            btn.disabled = false;
        } else {
            btn.disabled = true;
        }
    }

    num.addEventListener("input", check);

    //ajdusting width of product section in mobiles desktop mode

    if (window.innerHeight > 1200)
    {
        document.querySelector('.allproducts').style.height = "65vh";
    }

    //product click


    function call(elem)
    {
        document.getElementById("clicked_elem").value = elem;
        document.getElementById("hidden_form").submit();
    
    }

    // document.querySelector("#rmbtn").addEventListener('click',()=>{callrm();});
    function callrm(elem)
    {
        
        document.getElementById("clicked_elem2").value = elem;
        document.getElementById("hidden_form2").submit();
    }

    function checkCat(cat)
    {
    //    alert(cat);   
        let title = document.querySelector(".product-heading");
        let allproducts = document.querySelectorAll(".dynamic-product");
        let flag = true;
        allproducts.forEach(function (elem) {
            title.innerHTML = "<h1>Products</h1>";

            elem.style.display = "block";
            if (elem.classList.contains(cat))
            {
//                alert(cat);
                flag = false;
            } else
            {
//                alert("false");
                elem.style.display = "none";

            }

        });

        if (flag)
        {
            title.innerHTML = "<h5>No Products Found of category " + cat + "</h5>";
        }


    }


    