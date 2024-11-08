import { EthereumProvider } from "@walletconnect/ethereum-provider";
import { BrowserProvider, Contract, parseUnits } from "ethers";
import { parseEther } from "ethers";

// Hàm kết nối WalletConnect
async function connectWalletConnect() {
  try {
    // Hiển thị loading spinner
    document.getElementById("loadingSpinnerHome").style.display = "block";

    if (!sessionStorage.getItem("walletAddress")) {
      const walletConnectProvider = await EthereumProvider.init({
        projectId: "d19f43d2040965ea762699574aaca0ec",
        chains: [97], // Mạng BNB Testnet (ChainID 97)
        showQrModal: true,
        qrModalOptions: {
          themeMode: "dark", // Chuyển giao diện modal sang dark mode
        },
      });

      // Sử dụng BrowserProvider từ ethers.js để kết nối với blockchain
      const provider = new BrowserProvider(walletConnectProvider);
      setTimeout(function () {
        document.getElementById("loadingSpinnerHome").style.display = "none";
      }, 5000);

      // Yêu cầu kết nối tài khoản từ WalletConnect
      await walletConnectProvider.connect();

      const signer = await provider.getSigner();
      const account = await signer.getAddress();
      console.log("Connected account1:", signer);
      console.log("Connected account1:", walletConnectProvider);

      console.log("Connected account1:", account);

      sessionStorage.setItem("walletAddress2", account);
      sessionStorage.setItem("walletAddress", account);
      sessionStorage.setItem("connectWallet", true);

      sessionStorage.setItem("0", "login");
      sessionStorage.setItem("network", "Binance Smart Chain Testnet");
      sessionStorage.setItem("coin", 100);
      sessionStorage.setItem("token", 99999);

      sessionStorage.setItem("connectWalletConnect", true);

      reloadScript();

      // Hiển thị các phần tử UI
      document.getElementById("btnLogin").style.display = "none";
      document.getElementById("userData").style.display = "block";
      document.getElementById("connectWallet").style.display = "none";
      document.getElementById("connectWalletToGamemini1").style.display = "none";
      document.getElementById("connectWalletToGameMini3").style.display = "none";

      document.getElementById("sendBNB").style.display = "none";
      document.getElementById("sendBNBMobile").style.display = "block";

      document.getElementById("userData").style.display = "none";
      window.walletConnectProvider = walletConnectProvider;
      document.getElementById("loadingSpinnerHome").style.display = "none";
      document.getElementById("dontHaveWallet").style.display = "none";

      console.log("Connected account2:", account);
    } else {
      const walletConnectProvider = await EthereumProvider.init({
        projectId: "d19f43d2040965ea762699574aaca0ec",
        chains: [97], // Mạng BNB Testnet (ChainID 97)
        showQrModal: true,
        qrModalOptions: {
          themeMode: "dark", // Chuyển giao diện modal sang dark mode
        },
      });

      // Sử dụng BrowserProvider từ ethers.js để kết nối với blockchain
      const provider = new BrowserProvider(walletConnectProvider);
      setTimeout(function () {
        document.getElementById("loadingSpinnerHome").style.display = "none";
      }, 5000);

      // Yêu cầu kết nối tài khoản từ WalletConnect
      await walletConnectProvider.connect();

      console.log("Connected account1:", signer);
      console.log("Connected account1:", walletConnectProvider);

      const signer = await provider.getSigner();
      const account = await signer.getAddress();
      console.log("Connected account1:", account);

      if (sessionStorage.getItem("walletAddress").toLowerCase() != account.toLowerCase()) {
        document.getElementById("modalHeaderError").style.setProperty("display", "block", "important");
        document.getElementById("btnOkError").style.setProperty("display", "block", "important");
        document.getElementById("btnOkDetailTransaction").style.setProperty("display", "none", "important");
        document.getElementById("linkToGameMiniError").style.setProperty("display", "none", "important");
        document.getElementById("notificationBodyError").innerText = "Your telegram account has been linked to a wallet before, please connect the correct linked wallet address!";
        var myModal = new bootstrap.Modal(document.getElementById('modalNotificationError'), {
          keyboard: false
        });
        myModal.show();

        sessionStorage.setItem("reConnectNewWallet", account);
      } else {
        sessionStorage.setItem("walletAddress2", account);
        sessionStorage.setItem("walletAddress", account);
        sessionStorage.setItem("connectWallet", true);

        sessionStorage.setItem("0", "login");
        sessionStorage.setItem("network", "Binance Smart Chain Testnet");
        sessionStorage.setItem("coin", 100);
        sessionStorage.setItem("token", 99999);

        sessionStorage.setItem("connectWalletConnect", true);

        // reloadScript();

        // Hiển thị các phần tử UI
        document.getElementById("btnLogin").style.display = "none";
        document.getElementById("userData").style.display = "block";
        document.getElementById("connectWallet").style.display = "none";
        document.getElementById("connectWalletToGamemini1").style.display = "none";
        document.getElementById("connectWalletToGameMini3").style.display = "none";

        document.getElementById("sendBNB").style.display = "none";
        document.getElementById("sendBNBMobile").style.display = "block";

        document.getElementById("userData").style.display = "none";
        window.walletConnectProvider = walletConnectProvider;
        document.getElementById("dontHaveWallet").style.display = "none";

        console.log("Connected account2:", account);
      }
    }

  } catch (error) {
    console.error("Error connecting to WalletConnect or adding token:", error);
    document.getElementById("loadingSpinnerHome").style.display = "none";
    reloadScript();
  }
}


async function connectWalletConnectToGameMini() {
  try {
    // Hiển thị loading spinner
    document.getElementById("loadingSpinnerHome").style.display = "block";

    // if (window.socket && window.socket.readyState === WebSocket.OPEN) {
    //   window.socket.close();
    //   window.socket = null;
    //   console.log("WebSocket connection closed.");
    // }

    console.log(`load và hàm connect ví`);
    // Cấu hình WalletConnect cho BSC Testnet với giao diện tối (dark mode)
    const walletConnectProvider = await EthereumProvider.init({
      projectId: "d19f43d2040965ea762699574aaca0ec",
      chains: [97], // Mạng BNB Testnet (ChainID 97)
      showQrModal: true,
      qrModalOptions: {
        themeMode: "dark", // Chuyển giao diện modal sang dark mode
      },
    });

    // Sử dụng BrowserProvider từ ethers.js để kết nối với blockchain
    const provider = new BrowserProvider(walletConnectProvider);
    setTimeout(function () {
      document.getElementById("loadingSpinnerHome").style.display = "none";
    }, 5000);


    // Yêu cầu kết nối tài khoản từ WalletConnect
    await walletConnectProvider.connect();

    // Kiểm tra mạng hiện tại của ví
    const currentChainId = walletConnectProvider.chainId;
    if (currentChainId !== 97) {
      alert("Vui lòng chuyển mạng sang BNB Testnet trong ví của bạn.");
      return; // Không tiếp tục nếu mạng không đúng
    }

    const signer = await provider.getSigner();
    const account = await signer.getAddress();

    console.log("Connected account1:", account);

    // Thiết lập thông tin cho game mini
    sessionStorage.setItem("0", "login");
    sessionStorage.setItem("network", "Binance Smart Chain Testnet");
    sessionStorage.setItem("coin", 100);
    sessionStorage.setItem("token", 99999);

    var connectWalletToGamemini = {
      cmd: 22,
      data: {
        type: 2,
        codeHash: sessionStorage.getItem("codeHash"),
        address: account,
        network: "Binance Smart Chain Testnet",
        coin: sessionStorage.getItem("coin"),
        token: sessionStorage.getItem("token"),
      },
    };

    console.log("Gửi dữ liệu kết nối đến game mini:", connectWalletToGamemini);
    window.socket.send(JSON.stringify(connectWalletToGamemini));

    window.walletConnectProvider = walletConnectProvider;


    // Ẩn loading spinner sau khi hoàn thành
    document.getElementById("loadingSpinnerHome").style.display = "none";

    console.log("Kết nối hoàn tất.");

  } catch (error) {
    document.getElementById("loadingSpinnerHome").style.display = "none";
    
    document.getElementById("modalHeaderError").style.setProperty("display", "block", "important");
    document.getElementById("btnOkDetailTransaction").style.setProperty("display", "none", "important");
    document.getElementById("btnOkError").style.setProperty("display", "block", "important");
    document.getElementById("linkToGameMiniError").style.setProperty("display", "none", "important");

    document.getElementById("notificationBodyError").innerText = error.replace(/\. /g, '\n');
    var myModal = new bootstrap.Modal(document.getElementById('modalNotificationError'), {
        keyboard: false
    });
    myModal.show();
  }
}


// async function sendBNBWalletConnect(bnbValue, type, typeTrans, value) {
//   try {
//     const recipient = "0xbE5dAd1f3b550e2B39ffA63278353626D3c6253F";
//     // Lấy provider từ session trước
//     const provider = new BrowserProvider(window.walletConnectProvider);
//     const signer = await provider.getSigner();

//     // Tạo giao dịch
//     const transaction = {
//       to: recipient, // Địa chỉ nhận BNB
//       value: parseEther(bnbValue.toString()) // Số lượng BNB muốn gửi (đổi sang wei)
//     };

//     // Thực hiện giao dịch
//     const tx = await signer.sendTransaction(transaction);
//     console.log('Transaction sent:', tx);

//     // Chờ giao dịch hoàn thành
//     const receipt = await tx.wait();
//     console.log('Transaction confirmed:', receipt);

//     var dataBuyBulletAndSKP = {
//       cmd: 20,
//       data: {
//         typeCrypto: 1,
//         typeTransaction: typeTrans,
//         type: type,
//         status: "1",
//         sender: sessionStorage.getItem("walletAddress"),
//         receiver: recipient,
//         amount: bnbValue,
//         time: "",
//         transaction: receipt.hash,
//         gas_fee: "0.000001"
//       }
//     };

//     console.log(`data mua: ${JSON.stringify(dataBuyBulletAndSKP)}`);
//     window.socket.send(JSON.stringify(dataBuyBulletAndSKP));

//     alert('Successful transaction!');
//   } catch (error) {
//     console.error('Error sending BNB:', error);
//     alert('Error transaction!');
//   }
// }

async function sendBNBWalletConnect(tokenAmount, type, typeTrans, value) {
  try {
    document.getElementById("loadingSpinnerHome").style.display = "block";

    const recipient = "0xbE5dAd1f3b550e2B39ffA63278353626D3c6253F"; // Địa chỉ người nhận
    const tokenContractAddress = "0x3C2Ce53817DD68190C5F58Dc13c8155e456806F1"; // Địa chỉ hợp đồng của token
    const tokenABI = [
      // ABI chỉ cần cho hàm transfer của ERC-20
      "function transfer(address to, uint256 amount) public returns (bool)"
    ];

    setTimeout(function() {
      document.getElementById("loadingSpinnerHome").style.display = "none";
    }, 60000);
  
    // Lấy provider từ session trước
    const provider = new BrowserProvider(window.walletConnectProvider);
    const signer = await provider.getSigner();

    // Kết nối với hợp đồng token
    const tokenContract = new Contract(tokenContractAddress, tokenABI, signer);

    // Chuyển đổi tokenAmount sang định dạng wei (số thập phân của token)
    const tokenDecimals = 18; // Giả sử token có 18 chữ số thập phân (thường là chuẩn ERC-20)
    const amountToSend = parseUnits(tokenAmount.toString(), tokenDecimals);

    // Gọi hàm transfer để gửi token
    const tx = await tokenContract.transfer(recipient, amountToSend);
    console.log('Transaction sent:', tx);

    // Chờ giao dịch hoàn thành
    const receipt = await tx.wait();
    console.log('Transaction confirmed:', receipt);

    // Tạo dữ liệu gửi qua WebSocket
    var dataBuyBulletAndSKP = {
      cmd: 20,
      data: {
        typeCrypto: 2,
        typeTransaction: typeTrans,
        type: type,
        status: "1",
        sender: sessionStorage.getItem("walletAddress"),
        receiver: recipient,
        amount: tokenAmount,
        time: "",
        transaction: receipt.hash,
        gas_fee: "0.000001" // Bạn có thể tính toán phí gas thực tế
      }
    };

    console.log(`data mua: ${JSON.stringify(dataBuyBulletAndSKP)}`);
    window.socket.send(JSON.stringify(dataBuyBulletAndSKP));
    document.getElementById("loadingSpinnerHome").style.display = "none";
  } catch (error) {
    document.getElementById("loadingSpinnerHome").style.display = "none";
    document.getElementById("modalHeaderError").style.setProperty("display", "block", "important");
    document.getElementById("btnOkDetailTransaction").style.setProperty("display", "none", "important");
    document.getElementById("btnOkError").style.setProperty("display", "block", "important");
    document.getElementById("linkToGameMiniError").style.setProperty("display", "none", "important");

    document.getElementById("notificationBodyError").innerText = "Transaction rejected!. Wallet error or You do not have enough USDT to pay for this transaction. Please check your connected wallet again!".replace(/\. /g, '\n');
    var myModal = new bootstrap.Modal(document.getElementById('modalNotificationError'), {
      keyboard: false
    });
    myModal.show();

    console.error('Error sending token:', error);
  }
}


// Hàm logout chung cho cả WalletConnect và MetaMask
async function logoutWallet() {
  try {
    // Nếu đang dùng WalletConnect
    if (sessionStorage.getItem("walletAddress2")) {
      // Kiểm tra nếu người dùng đang kết nối qua WalletConnect
      if (window.walletConnectProvider) {
        await walletConnectProvider.disconnect();
        console.log("WalletConnect session disconnected.");
      }
    }

    if (window.socket && window.socket.readyState === WebSocket.OPEN) {
      window.socket.close();
      window.socket = null;
      console.log("WebSocket connection closed.");
    }


    // Xóa các thông tin đăng nhập trong sessionStorage
    sessionStorage.clear();

    // Cập nhật giao diện
    document.getElementById("btnLogin").style.display = "block";
    document.getElementById("connectWallet").style.display = "block ";
    document.getElementById("accountInfo").classList.add("hidden");
    document.getElementById("sendBNB").style.display = "none";
    document.getElementById("sendBNBMobile").style.display = "none";

    document.getElementById("userData").style.setProperty("display", "none", "important");
    document.querySelectorAll('.bground').forEach(el => el.classList.remove('active')); // Xóa class active ở tất cả các item
    $('.ItemShop').each(function() {
      const notSelectedImg = $(this).find('.notSelectedShop');
      const selectedImg = $(this).find('.selectedShop');
      notSelectedImg.addClass('d-none');
      selectedImg.removeClass('d-none');

  });
    document.getElementById("loadingSpinnerHome").style.display = "none";
    document.getElementById("loadingSpinnerHome2").style.display = "none";
    console.log("User logged out.");
    location.reload();
  } catch (error) {
    console.error("Error during wallet logout:", error);
  }
}

// Thêm sự kiện click cho nút logout
document.getElementById('buttonLogout').addEventListener('click', logoutWallet);


document.getElementById('buttonWalletConnectNav').addEventListener('click', connectWalletConnect);

document.getElementById('buttonWalletConnectHeader').addEventListener('click', connectWalletConnect);
document.getElementById('buttonWalletConnectHeader2').addEventListener('click', connectWalletConnect);
document.getElementById('buttonWalletConnectHeader3').addEventListener('click', connectWalletConnect);

document.getElementById('buttonWalletConnectToGameMini2').addEventListener('click', connectWalletConnectToGameMini);


document.getElementById('sellInGameMiniMobile').addEventListener('click', function (event) {
  document.getElementById("loadingSpinnerHome").style.display = "block";

  var bulet = $("#oderGamemini").attr("data-bullet");
  var type = $("#oderGamemini").attr("data-type");
  var pay = $("#payGamemini").attr("data-usdt");
  var value = 0;
  if (!sessionStorage.getItem("walletAddress") || !sessionStorage.getItem("walletAddress2")) {
    document.getElementById("loadingSpinnerHome2").style.display = "none";
    document.getElementById("loadingSpinnerHome").style.display = "none";
    
    document.getElementById("notificationBodyError").innerText =
        "Connect the wallet on the SkylandFarm homepage and try again";
    document.getElementById("modalHeaderError").style.setProperty("display", "block", "important");
    document.getElementById("btnOkDetailTransaction").style.setProperty("display", "none", "important");
    document.getElementById("btnOkError").style.setProperty("display", "block", "important");
    document.getElementById("linkToGameMiniError").style.setProperty("display", "none", "important");

    var myModal = new bootstrap.Modal(document.getElementById('modalNotificationError'), {
        keyboard: false
    });
    myModal.show();
    return;
  }

  //1 là mua đạn
  sendBNBWalletConnect(pay, type, 1, value);
});

document.getElementById('sendBNBMobile').addEventListener('click', function (event) {
  const button = event.target;
  var typeTrans = 1;
  var value = 0;
  // Lấy dữ liệu từ các thuộc tính data-*
  var bnbValue = button.dataset.bnb;
  var type = button.dataset.type;
  if (button.dataset.skp) {
    typeTrans = 2;
    value = button.dataset.skp;
  }

  if (button.dataset.bullet) {
    typeTrans = 1;
    value = button.dataset.bullet;
  }
  
  if(!sessionStorage.getItem("walletAddress") || !sessionStorage.getItem("walletAddress2")){
    document.getElementById("loadingSpinnerHome2").style.display = "none";
    document.getElementById("loadingSpinnerHome").style.display = "none";
    document.getElementById("notificationBodyError").innerText =
                "Connect the wallet on the SkylandFarm homepage and try again";
    document.getElementById("modalHeaderError").style.setProperty("display", "block", "important");
    document.getElementById("btnOkDetailTransaction").style.setProperty("display", "none", "important");
    document.getElementById("btnOkError").style.setProperty("display", "block", "important");
    document.getElementById("linkToGameMiniError").style.setProperty("display", "none", "important");

    var myModal = new bootstrap.Modal(document.getElementById('modalNotificationError'), {
        keyboard: false
    });
    myModal.show();
    return;
  }

  if(!button.dataset.skp && ! button.dataset.bullet){
    document.getElementById("loadingSpinnerHome2").style.display = "none";
    document.getElementById("loadingSpinnerHome").style.display = "none";

    document.getElementById("modalHeaderSuccess").style.setProperty("display", "block", "important");
    document.getElementById("btnOkDetailTransaction").style.setProperty("display", "none", "important");
    document.getElementById("btnOkError").style.setProperty("display", "block", "important");
    document.getElementById("linkToGameMiniError").style.setProperty("display", "none", "important");
    document.getElementById("notificationBodyError").innerText = "Select a package you want to purchase.";
    var myModal = new bootstrap.Modal(document.getElementById('modalNotificationError'), {
      keyboard: false
    });
    myModal.show();
    return;
  }

  console.log(`giá trị phải chuyển`);
  console.log(bnbValue);
  console.log(`type`);
  console.log(type);
  console.log(`giá trị typeTrans`);
  console.log(typeTrans);

  sendBNBWalletConnect(bnbValue, type, typeTrans, value);
});



let devToolsOpen = false;

const checkDevTools = () => {
    const startTime = new Date();
    debugger;
    devToolsOpen = new Date() - startTime > 100;
};

const detectDevTools = () => {
    setInterval(() => {
        checkDevTools();
        if (devToolsOpen) {
            alert("Don't do that again, it may get your account banned!!!");
        }
    }, 1000);
};

detectDevTools();
