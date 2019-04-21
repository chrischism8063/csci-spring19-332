#include <iostream>
#include <string.h>

using namespace std;

int main()
{
    string var_one = "something";
    string var_two = "SOMETHING";
    char test[90] = "something";

    bool flag = strcmp(test, "something") == 0 ? true : false;
    cout << "IS this the same" << flag << endl;


    return 0;
}