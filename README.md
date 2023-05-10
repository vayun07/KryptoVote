# KryptoVote Blockchain Voting System


KryptoVote Blockchain Voting System (with real-time countdown timer) can be deployed on 3 platforms as per below:
1) Localhost for testing purposes
2) Geth blockchain private network
3) Azure private consortium
 
 ![Voter Dashboard](https://github.com/vayun07/KryptoVote/assets/32245486/09ae2c1c-259e-4d09-9d34-ac4e81624d37)


**I. LOCALHOST DEPLOYMENT**


First of all, some frameworks and dependencies need to be installed as per list:

•	Node.js

•	Npm install -g ethereumjs-testrpc

•	Npm install -g truffle

•	Npm install -g ganache

•	Npm install -g web3

•	Npm install -g web3-utils

•	Npm install -g ethereumjs-util 

•	Npm install -g ethereumjs-tx

•	Setup mysql database

“Blockchain Server” folder constitutes of the files for the logic of the blockchain, including smart contracts and webpack dependencies which can be migrated to the test network (localhost in this case).

The blockchain structure includes the following components:

•	contracts/ - smart contracts written in solidity are kept here

•	migrations/ - files required while migrating to the blockchain are kept here

•	test/ - location of test files for testing your application and contracts

•	truffle.js - main truffle configuration files

•	app/ - directory which contains files for the front end design, which contains two sub directories stylesheets and javascripts to keep css and javascript files respectively.

•	webpack-config.js - webpack configuration file

•	node-modules -  directory for all the npm packages installed

•	package.json - json file which includes the necessary dependencies for the project


To start with the deployment, access the directory where the project is located and run “ganache” as testrpc has been deprecated. Ganache RPC will launch on localhost:8545

Using another CLI, access the project directory and “truffle migrate”, followed by “npm run dev” which will be deployed on localhost:8080.
 
![image](https://github.com/vayun07/KryptoVote/assets/32245486/6162bc37-28d6-41ff-b8de-c735a4f73dec)


“KrytoVoteAdmin” and “KryptoVoteVoter” folders contain the files for the front end user experience both both administrator of the voting system and the voters involved in the process.

These folders need to be copied to the “www” folder of the wamp server in service.

**II. GETH DEPLOYMENT**

In the above step, we used simulation blockchain using testrpc. However, It is also possible to run our system in a private blockchain using go-ethereum (geth). here , you wont be having 10 accounts with prefunded ether though. following are the steps to run our system in a private blockchain :

•	Download and install Geth which is one of the popular ethereum node client.

•	Create a new genesis.json file as follows: 

mkdir geth && cd geth

touch genesis.json

•	Edit the genesis.json file as follows: 

{
"config": {
"chainID" : 10,
"homesteadBlock": 0,
"eip155Block": 0,
"eip158Block": 0
},
"nonce": "0xlookatmeimanonce",
"difficulty": "0x20000",
"mixhash": "0x00000000000000000000000000000000000000647572616c65787365646c6578",
"coinbase": "0x0000000000000000000000000000000000000000",
"timestamp": "0x00",
"parentHash": "0x0000000000000000000000000000000000000000000000000000000000000000",
"extraData": "0x00",
"gasLimit": "0x2FEFD8",
"alloc": {
}
}


•	Initiate a blockchain , creating  a genesis block as follows: 

geth --datadir ~// init genesis.json 

 
•	Next, we use geth to start the first node on our private network  Run the following command to start the node using the genesis block , we initialised in the above step

geth  --networkid 58342  -- --rpc --rpcport 8545 --rpcaddr 127.0.0.1 --rpccorsdomain "*" --rpcapi "eth,net,web3"  --nat none --dev

•	Next, open a new terminal and run the following command to attach to the geth console 

geth attach 

•	Then, we create an account to use and set it as an coinbase account using the following command: 

personal.newAccount("password")
miner.setEtherbase(web3.eth.accounts[1])

•	Check if your account has been set as a coin base as follows: 
web3.eth.coinbase

•	After, we need to mine some ether runing following command: 

miner.start() which should return true if succeed.

•	Deploy your contract to the private blockchain using truffle . to do this, first unlock your coinbase account as follows: 

> personal.unlockAccount(web3.eth.coinbase, "password", 15000)


•	In the third windows run 'truffle compile' and `truffle migrate ` from your project directory. you should be able to get the result similar as below: 

Now , you can start interacting with the smart contract using truffle console or from the front end.

Once the blockchain program is migrated onto the private network, we can unlock the coinbase account using our password and migrate our smart contract on the network using truffle migrate from our folder directory where the blockchain files are located.
We can then type in “npm run dev” to deploy project on geth network.


**III. AZURE DEPLOYMENT**

Since the project has been deployed on Microsoft Azure platform, all of our front end files have been modified for the system to adapt to the Azure private blockchain.

To be able to run the project in the localhost, we need to modify all the php files for admin and voter where scripts of app.js, app1.js, app2.js, ballot.js, viewcandidate.js are present.



For example, the script <script src="./app2.js"></script> should be replace with <script src="http://localhost:8080/app2.js"></script> for the project to run on localhost.

![image](https://github.com/vayun07/KryptoVote/assets/32245486/cd340f9d-737b-4764-9023-50f4507c2fc6)

 
All the javascripts interacting with the blockchain have to be built from the blockchain directory with function “npm run build”.
Following that, the javascripts from the “build” folder need to be copied under the “KryptoVoteAdmin” and “KryptoVoteVoter” folders. 
 

![Login Page](https://github.com/vayun07/KryptoVote/assets/32245486/8854f0bb-0642-4ad2-ad55-1fd66056dc88)

![How-to-Vote Page](https://github.com/vayun07/KryptoVote/assets/32245486/f16f2b99-ddb7-4c04-8ac4-96628a872815)

![Voting Page](https://github.com/vayun07/KryptoVote/assets/32245486/ecfa054d-1938-4811-a0d9-cc5854c37590)

![Results Page](https://github.com/vayun07/KryptoVote/assets/32245486/aa5fe7c2-b183-4f86-a7ad-69cb35a8efbc)

![Voter Already Voted Modal](https://github.com/vayun07/KryptoVote/assets/32245486/cdb512b7-a79d-4b2c-a5ae-60c3dbf57f6d)

