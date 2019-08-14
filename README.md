 #   - - - - - - - - - - - - - - - - -   Holo Builder  - - - - - - - - - - - - - - - - - 

## Holo
Holo is a tool that helps me install and configure all my workspace.
Everything that is repetitive, and it costs me time whenever I format my machine, just to leave every detail as I like, the holo configures. A very useful robot takes good care of him.

**Every setting is specific to me.**

But feel free to pick up your fork and configure it your way. Or even send a PR

## Install

By default, the installation path is set to `~/vendor`. However if you feel like using any other directory, feel free to change it.

### Composer 

Make sure you already have composer installed

[What is composer?](https://getcomposer.org/)

 #### Frist
 
 Run this command on your favorite terminal
 
```
composer require lwwcas/holo-builder
```

#### Second

Paste this code in last line of the file `.bashrc`

```  
source ~/vendor/lwwcas/holo-builder/src/Ubuntu/core.cfg
```

#### Third

Close your terminal and reopen

Is done,  Really easy.



## Examples

```  
holo install:vscode
```

```  
holo vscode:extensions
```

## Commands

### Install

You can install Google Chrome with:

```  
holo install:chrome
```

You can install Git (and generate a ssh key) with:

```  
holo install:git
```

You can install Visual Studio Code with:

```  
holo install:vscode
```

### Visual Studio Code

Set up Visual Studio Code with everything you need with:

```  
holo vscode:build
```

You can install the monospaced font with programming ligatures (i use Fira Code) with:

```  
holo vscode:font
```

You can install all my extensions with:

```  
holo vscode:extensions
```

You can set my configuration with:
ALERT : Is import you back up your settings!!
```  
holo vscode:config
```

## Contributing

If you happen to find any bug, or have an idea to improve the holo please open an issue or submit a PR.
(A kind PR please)
