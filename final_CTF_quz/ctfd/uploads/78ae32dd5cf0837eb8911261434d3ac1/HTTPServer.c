#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
void debug(){

	puts("Debug mode!");
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
	char buf[0x10];
	setvbuf(stdout,0,2,0);
	read(0,buf,100);
	printf("HTTP/1.1 200 OK\nServer:HappyPwnServer\n\n<h1>This is a good server</h1>");
	return 0 ;
}
