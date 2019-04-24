#include <iostream>
#include <stdio.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <string.h>
#include <stdlib.h>
#include <arpa/inet.h>
#include <ctype.h>
#include <cstdlib>

using namespace std;

int main(){
    // This is server side
    // -----------------This may be used as a template--------------------
    int udpSocket, nBytes;
    char buffer[1024], return_msg[1024];

    struct sockaddr_in serverAddr, clientAddr;
    struct sockaddr_storage serverStorage;

    socklen_t addr_size, client_addr_size;

    udpSocket = socket(PF_INET, SOCK_DGRAM, 0);
    serverAddr.sin_family = AF_INET;
    cout << "please enter your listening port: ";
    cin >> buffer;

    serverAddr.sin_port = htons(atoi(buffer));
    serverAddr.sin_addr.s_addr = INADDR_ANY;
    memset(serverAddr.sin_zero, '\0', sizeof serverAddr.sin_zero);
    bind(udpSocket, (struct sockaddr *)&serverAddr, sizeof(serverAddr));
    
    addr_size = sizeof serverStorage;
    do{
        string a;

        nBytes = recvfrom(udpSocket, buffer, 1024, 0, (struct sockaddr *)&serverStorage, &addr_size);

        if(strncmp(buffer, "123456789", strlen(buffer)-1) == 0){
            string a = "Joseph";
            strcpy(return_msg, a.c_str());
            return_msg[a.length()] = 0;
        }else if(strncmp(buffer, "111111111", strlen(buffer)-1) == 0){
            string b = "Sean";
            strcpy(return_msg, b.c_str());
            return_msg[b.length()] = 0;
        }else if(strncmp(buffer, "190967", strlen(buffer)-1) == 0){
            string c = "Chris";
            strcpy(return_msg, c.c_str());
            return_msg[c.length()] = 0;
        }        
        cout << "I received: " << buffer << endl;
        // When wanting to send back to server/client, always use sendto()
        sendto(udpSocket, return_msg, strlen(return_msg), 0, (struct sockaddr *)&serverStorage, addr_size);
    }while(strncmp(return_msg, "bye", strlen(return_msg)-1) != 0);
    cout << "Exit..." << endl;

    return 0;
}