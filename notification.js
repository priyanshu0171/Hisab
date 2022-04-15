function showNotification() {
    const notification = new Notification("This is a notification", {
        body: "This is a notification body",
        icon: "http://127.0.0.1/hisab%201.2/Assets/images/ic_launcher-playstore.png"
    });

    notification.onclick = (e) => {
        window.location.href = "https://google.com";
    }
}
// console.log(Notification.permission);
//three values :  default, granted , denied
if (Notification.permission === "granted") {
    showNotification();
} else if (Notification.permission !== "denied") {
    Notification.requestPermission().then(permission => {
        if (permission === "granted") {
            showNotification();
        }
    });
}
