let valor = document.getElementById("valor");
        let btn = document.querySelector(".btn");
        let form = document.querySelector("form");

        valor.addEventListener("keypress", (e) => {
            if (e.key === "Enter") {
                e.preventDefault();
                if (valor.value === "" || /[^\d]/.test(valor.value)) {
                    alert("Defina um valor válido, sem caracteres especiais");
                    valor.value = 1;
                } else {
                    form.submit();
                }
            }

        })

        btn.addEventListener("click", (e) => {
            e.preventDefault();
            if (valor.value === "" || /[^\d]/.test(valor.value)) {
                alert("Defina um valor válido, sem caracteres especiais");
                valor.value = 1;

            } else if (valor) {
                form.submit();
            }
        })