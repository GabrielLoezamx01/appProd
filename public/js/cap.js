document.addEventListener("submit", function (e) {
    e.preventDefault();
    grecaptcha.ready(function () {
        grecaptcha
            .execute("6LcWPqgpAAAAALnTVjiik6enrsHxx-691jxYd2G5", {
                action: "submit",
            })
            .then(function (token) {
                let form = e.target;
                console.log(form);
                let input = document.createElement("input");
                input.type = "hidden";
                input.name = "g-recaptcha-response";
                input.value = token;
                form.appendChild(input);
                form.submit();
            });
    });
});
