#include <pthread.h>
#include <iostream>
#include <stdio.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <string.h>
#include <stdlib.h>
#include <arpa/inet.h>
#include <ctype.h>
#include <cstdlib>
#include <cstring>

using namespace std;

void *Receiver(void *ptr);
void *Sending(void *ptr);

char  outgoing_msg[1024], buffer[1024], port_string[10], ip_string[17], return_msg[1024];;

pthread_mutex_t mutex1 = PTHREAD_MUTEX_INITIALIZER;

int main(){
    pthread_t Receiver_thread, Sending_thread;

    const char *message1 = "Receiver Thread";
    const char *message2 = "Sending Thread";

    int iret1, iret2;

    cout << "Please enter your listening port: ";
    cin >> buffer;

    cout << "Please enter your buddy's port:";
    cin >> port_string;

    cout << "PLease enter your buddy's IP:";
    cin >> ip_string;


    iret1 = pthread_create(&Receiver_thread, NULL, &Receiver, (void *)message1);
    //If not successful
    if(iret1){
        fprintf(stderr, "Error - pthread_create() return code: %d\n", iret1);
        exit(EXIT_FAILURE);
    }

    iret2 = pthread_create(&Sending_thread, NULL, &Sending, (void *)message2);
    //If not successful
    if(iret2){
        fprintf(stderr, "Error - pthread_create() return code: %d\n", iret2);
        exit(EXIT_FAILURE);
    }

    //Bring threads back together
    pthread_join(Sending_thread, NULL);
    pthread_join(Receiver_thread, NULL);

    return 0;
}

//stand alone thread
void *Receiver(void *ptr){
    char *message;

    // Inserted Sever Code
    int udpSocket, nBytes;

    struct sockaddr_in serverAddr, clientAddr;
    struct sockaddr_storage serverStorage;

    socklen_t addr_size, client_addr_size;

    udpSocket = socket(PF_INET, SOCK_DGRAM, 0);
    serverAddr.sin_family = AF_INET;

    serverAddr.sin_port = htons(atoi(buffer));
    serverAddr.sin_addr.s_addr = INADDR_ANY;
    memset(serverAddr.sin_zero, '\0', sizeof serverAddr.sin_zero);
    bind(udpSocket, (struct sockaddr *)&serverAddr, sizeof(serverAddr));
    
    addr_size = sizeof serverStorage;
    do{
        nBytes = recvfrom(udpSocket, buffer, 1024, 0, 
            (struct sockaddr *)&serverStorage, &addr_size);

        //TL
        cout << "I received: " << buffer  << endl;
    }while(strncmp( outgoing_msg, "QUIT", strlen(outgoing_msg)-1) != 0);
   
    return NULL;
}

//stand alone thread
void *Sending(void *ptr){
    char *message;

    //Inserted Client here
    int clientSocket, portNum, nBytes;
    char input_buffer[1024];

    struct sockaddr_in serverAddr;
    socklen_t addr_size;

    clientSocket = socket(AF_INET, SOCK_DGRAM, 0);
    serverAddr.sin_family = AF_INET;

    //Assign integer into port number variable
    portNum = atoi(port_string);
    //Port number comes from user
    serverAddr.sin_port = htons(portNum);

    serverAddr.sin_addr.s_addr = inet_addr(ip_string);
    memset(serverAddr.sin_zero, '\0', sizeof(serverAddr.sin_zero));
    addr_size = sizeof serverAddr;

    do{
        cout << "Type a sentence to send to your buddy: ";
        cin.getline(input_buffer, 1024, '\n');

        if(buffer == "MONKEY"){
            string a =  "BANANA";
            strcpy (input_buffer, a.c_str());
        }else if(buffer == "ELEPHANT"){
            string b = "MOUSE";
            strcpy (input_buffer, b.c_str());
        }else if(buffer == "FLOWER"){
            string c = "BEAUTIFUL";
            strcpy (input_buffer, c.c_str());
        }else if(buffer == "HOUSE"){
            string d = "SAFE";
            strcpy (input_buffer, d.c_str());
        }else if(buffer == "CAR"){
            string d = "FAST";
            strcpy (input_buffer, d.c_str());
        }

        // Convert data in either upper or lowercase for standardization
        for(int i = 0; i < nBytes-1; i++)
            outgoing_msg[i] = toupper(input_buffer[i]);

        sendto(clientSocket, outgoing_msg, nBytes, 0, 
        (struct sockaddr * )&serverAddr, addr_size);
    }while(strncmp(outgoing_msg, "QUIT", strlen(outgoing_msg)-1) != 0);


    return NULL;
}