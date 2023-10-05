<div class="input-box">
            <input type="text" name="search" id="search" placeholder="Type here...">
            <span class="icon">
                <i class="uil uil-search search-icon"></i>
            </span>
            <i class="uil uil-times close-icon"></i>
        </div>
        .input-box{
        margin-left: 5%;
        position: relative;
        height: 44px;
        max-width: 50px;
        width: 100%;
        border-radius: 50px;
        background-color: #e9eaef;
        transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
    .input-box.open{
        max-width: 350px;
    }
    input{
        position: relative;
        outline: none;
        border: none;
        height: 100%;
        width: 100%;
        border-radius: 50px;
        font-size: 16px;
        font-weight: 400;
        color: #333;
        background-color: #e9eaef;
    }
    .input-box.open{
        padding: 0 15px 0 65px;
    }
    .icon{
        position: absolute;
        height: 100%;
        top: 0;
        left: 0;
        width: 50px;
        border-radius: 50px;
        display: flex;
        justify-content: center;
        background-color: #2c578f;
    }
    .search-icon,
    .close-icon{
        position: absolute;
        top: 50%;
        font-size: 30px;
        transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
    .search-icon{
        color: #fff;
        transform: translateY(-50%) rotate(90deg);
    }
    .input-box.open .search-icon{
        transform: translateY(-50%) rotate(0);
    }
    .close-icon{
        right: -45px;
        color: #000;
        padding: 5px;
        opacity: 0;
        pointer-events: none;
        transform: translateY(-50%);
    }
    .input-box.open .close-icon{
        opacity: 1;
        pointer-events: auto;
        transform: translateY(-50%) rotate(180deg);
    }