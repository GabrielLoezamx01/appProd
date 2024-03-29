function onClick(e) {
    e.preventDefault();
    grecaptcha.enterprise.ready(async () => {
        const token = await grecaptcha.enterprise.execute(
            "6LdwJacpAAAAAOcPIuzVDPwKMfKDaUPf-4kjDx0y",
            { action: "LOGIN" }
        );
    });
}
