#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
void eval(){

	puts("Got me!");
	int c;
	FILE *file;
	file = fopen("/flag", "r");
	if (file) {
    		while ((c = getc(file)) != EOF)
        		putchar(c);
    		fclose(file);
	}
}


int main(){
	char buf[0x20];
	setvbuf(stdout,0,2,0);
	printf("Read your input:");
	read(0,buf,100);
	return 0 ;
}
