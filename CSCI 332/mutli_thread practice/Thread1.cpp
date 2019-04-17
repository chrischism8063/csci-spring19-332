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

using namespace std;

void *Consumer(void *ptr);
void *Producer(void *ptr);

int common_int;
pthread_mutex_t mutex1 = PTHREAD_MUTEX_INITIALIZER;

int main(){
    pthread_t Consumer_thread, Producer_thread;

    const char *message1 = "Consumer Thread";
    const char *message2 = "Producer Thread";

    int iret1, iret2;

    iret1 = pthread_create(&Consumer_thread, NULL, &Consumer, (void *)message1);
    //If not successful
    if(iret1){
        fprintf(stderr, "Error - pthread_create() return code: %d\n", iret1);
        exit(EXIT_FAILURE);
    }

    iret2 = pthread_create(&Producer_thread, NULL, &Producer, (void *)message2);
    //If not successful
    if(iret2){
        fprintf(stderr, "Error - pthread_create() return code: %d\n", iret2);
        exit(EXIT_FAILURE);
    }

    //Bring threads back together
    pthread_join(Consumer_thread, NULL);
    pthread_join(Producer_thread, NULL);

    return 0;
}

//stand alone thread
void *Consumer(void *ptr){
    char *message;
    
    do{
        pthread_mutex_lock(&mutex1);
        common_int--;
        printf("Consuming: %i\n", common_int);
        pthread_mutex_unlock(&mutex1);
    }while(common_int > -1000000000);
    return NULL;
}

//stand alone thread
void *Producer(void *ptr){
    char *message;
    do{
        pthread_mutex_lock(&mutex1);
        common_int++;
        printf("Producing: %i\n", common_int);
        pthread_mutex_unlock(&mutex1);
    }while(common_int < 1000000000);
    return NULL;
}